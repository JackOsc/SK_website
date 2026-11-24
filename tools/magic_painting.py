"""Rebuild the homepage "magic painting" layers from the ink-on-white artwork.

Run from the repo root:  python3 tools/magic_painting.py
Needs numpy, scipy and Pillow. Writes into slowkarma/assets/img/:
  dynamite-live-1400/700.webp   the artwork with the moving pieces cut out
  magic-tip1/tip2/tongue.webp   the moving pieces (tail tip in two joints, tongue)
  magic-light.webp              mask of the linework allowed to glow
  magic-skin.webp               mask of the snake's scales for the travelling glint
Coordinates are in the 1400px artwork space. If a box or pivot changes,
update the matching percentages in assets/css/main.css (px / 14 = %).
"""
import os
ROOT = os.path.join(os.path.dirname(os.path.abspath(__file__)), '..', 'slowkarma', 'assets')
import json, numpy as np
from PIL import Image, ImageDraw, ImageFilter
from scipy import ndimage as ndi

# ---- ink alpha from the original drawing ----
src=os.path.join(ROOT, 'press', 'slow-karma-dynamite-artwork.jpg')
L=np.asarray(Image.open(src).convert('L')).astype(float)
L=np.pad(L,((0,1),(0,0)),mode='edge')[:2000,:2000]  # make square 2000x2000
bg=ndi.gaussian_filter(ndi.maximum_filter(L,31),15)
ink=24.0
a=np.clip((bg-L)/(bg-ink),0,1)
a=np.clip((a-0.06)/0.94,0,1)**0.85

import json, numpy as np
from PIL import Image, ImageDraw, ImageFilter
from scipy import ndimage as ndi

OUT = os.path.join(ROOT, 'img') + os.sep
W = 1400
a2 = a
A = np.asarray(Image.fromarray((a2 * 65535).astype(np.uint16)).resize((W, W), Image.LANCZOS)).astype(float) / 65535
A = np.clip(A, 0, 1)
ORANGE = np.array([221, 129, 66], float)
BG = np.array([10, 10, 10], float)

def poly_mask(pts, feather=0.8):
    im = Image.new('L', (W, W), 0)
    ImageDraw.Draw(im).polygon(pts, fill=255)
    if feather:
        im = im.filter(ImageFilter.GaussianBlur(feather))
    return np.asarray(im).astype(float) / 255

def halfplane(P, Q, keep_above=True):
    """1 on the side of line PQ with smaller y."""
    yy, xx = np.mgrid[0:W, 0:W]
    (x1, y1), (x2, y2) = P, Q
    cross = (x2 - x1) * (yy - y1) - (y2 - y1) * (xx - x1)
    # for P left of Q, cross<0 is above the line
    m = (cross < 0) if keep_above else (cross >= 0)
    return ndi.gaussian_filter(m.astype(float), 0.8)

def shift_line(P, Q, dy):
    return (P[0], P[1] + dy), (Q[0], Q[1] + dy)

# ---- tail tip, two segments ----
box_tip = poly_mask([(118, 752), (226, 752), (226, 880), (118, 880)], 0)
bag = poly_mask([(177, 853), (240, 853), (240, 900), (177, 900)], 0.6)  # bag corner: never moves
C1 = ((128, 871), (206, 846))
C2 = ((160, 820), (218, 806))
P1 = (171, 858)     # pivot where the tail leaves the bag
P2 = (189, 813)     # second joint

erase_tip = box_tip * halfplane(*C1) * (1 - bag)
seg1 = box_tip * halfplane(*shift_line(*C1, 7)) * (1 - halfplane(*shift_line(*C2, -6))) * (1 - bag)
seg2 = box_tip * halfplane(*shift_line(*C2, 6))

# ---- tongue ----
tongue = poly_mask([(558, 474), (574, 469), (597, 461), (612, 456), (624, 463), (619, 471), (604, 482), (598, 511), (555, 512)])
erase_tongue = poly_mask([(558, 474), (574, 469), (597, 461), (606, 458), (610, 469), (602, 482), (598, 511), (555, 512)])
PT = (615, 465)    # tongue root


# ---- v1.10 pieces: each is cut out of the base and moved on its own ----
yy0, xx0 = np.mgrid[0:W, 0:W]
def disc(cx, cy, r, feather=1.0):
    return ndi.gaussian_filter((((xx0 - cx) ** 2 + (yy0 - cy) ** 2) < r * r).astype(float), feather)

PIECES = {
    # alarm clock bell and its clapper; rattles about the middle of its base
    'bell': (poly_mask([(571, 640), (571, 618), (590, 606), (604, 604), (606, 597), (624, 597), (628, 608), (640, 612), (644, 596), (652, 590), (660, 594), (652, 640)]), (610, 640)),
    # the rocket on the right; shudders about the point where it sits in the crate
    'rocket': (poly_mask([(893, 590), (1009, 449), (1024, 456), (1024, 602), (1005, 608), (1004, 693), (910, 693), (904, 612), (893, 600)]), (955, 692)),
    # paper crane; rocks about its right wingtip, which rests on the dynamite
    'crane': (poly_mask([(178, 1078), (300, 1098), (392, 1072), (424, 1064), (426, 1078), (399, 1098), (398, 1206), (382, 1218), (250, 1230), (176, 1100)]), (414, 1078)),
    # candle flames; flicker from the wick
    'flame1': (poly_mask([(669, 1108), (697, 1108), (698, 1149), (668, 1149)]), (683, 1150)),
    'flame2': (poly_mask([(757, 1166), (784, 1166), (785, 1200), (756, 1200)]), (771, 1201)),
}

# ---- base ----
base_a = A * (1 - erase_tip) * (1 - erase_tongue)
for _m, _pv in PIECES.values():
    base_a = base_a * (1 - _m)
rgb = BG + base_a[..., None] * (ORANGE - BG)
base = Image.fromarray(np.clip(rgb + 0.5, 0, 255).astype(np.uint8))
base.save(OUT + 'dynamite-live-1400.webp', quality=86, method=6)
base.resize((700, 700), Image.LANCZOS).save(OUT + 'dynamite-live-700.webp', quality=84, method=6)

layers = {}
def save_layer(name, m, pivots):
    la = A * m
    ys, xs = np.where(la > 0.02)
    x0, y0, x1, y1 = xs.min() - 2, ys.min() - 2, xs.max() + 3, ys.max() + 3
    rgba = np.zeros((y1 - y0, x1 - x0, 4), np.uint8)
    rgba[..., :3] = ORANGE.astype(np.uint8)
    rgba[..., 3] = np.clip(la[y0:y1, x0:x1] * 255 + 0.5, 0, 255).astype(np.uint8)
    # 2x of the 1400 space would be overkill; these sit at ~1x on retina for a 34rem frame
    Image.fromarray(rgba, 'RGBA').save(OUT + 'magic-' + name + '.webp', lossless=True, method=6)
    layers[name] = dict(box=[int(x0), int(y0), int(x1), int(y1)], pivots=pivots)

save_layer('tip1', seg1, [P1])
save_layer('tip2', seg2, [P2])
save_layer('tongue', tongue, [PT])
for _n, (_m, _pv) in PIECES.items():
    save_layer(_n, _m, [_pv])

# CSS for every moving piece (paste into assets/css/main.css if anything changes)
for _n, _l in layers.items():
    x0, y0, x1, y1 = _l['box']
    print('.story-teaser__img .magic__bit--%s { left: %.3f%%; top: %.3f%%; width: %.3f%%; }' % (_n, x0 / 14, y0 / 14, (x1 - x0) / 14))
    print('.magic__joint--%s { transform-origin: %.3f%% %.3f%%; }' % (_n, _l['pivots'][0][0] / 14, _l['pivots'][0][1] / 14))

# ---- light mask: linework that can glow (rays, stars, candle flames, incense embers) ----
yy, xx = np.mgrid[0:W, 0:W]
sky = (yy < 505).astype(float)
snake_head = poly_mask([(596, 430), (640, 378), (800, 372), (830, 430), (830, 520), (596, 520)], 2)
fuse_zone = np.maximum(poly_mask([(270, 500), (620, 500), (620, 680), (270, 680)], 0), poly_mask([(952, 458), (1024, 458), (1024, 510), (952, 510)], 0))
flames = np.zeros((W, W))
for (cx, cy, r) in [(683, 1132, 22), (770, 1188, 22), (667, 1222, 22)]:
    flames = np.maximum(flames, ((xx - cx) ** 2 + ((yy - cy) * 0.75) ** 2 < r * r).astype(float))
embers = np.zeros((W, W))
for (cx, cy) in [(1121, 914), (1180, 971), (1080, 1041)]:
    embers = np.maximum(embers, ((xx - cx) ** 2 + (yy - cy) ** 2 < 20 * 20).astype(float))
light = A * np.clip(sky * (1 - snake_head) * (1 - fuse_zone) + flames + embers, 0, 1) * (1 - erase_tongue)
lm = Image.fromarray(np.clip(light * 255, 0, 255).astype(np.uint8)).resize((700, 700), Image.LANCZOS)
rgba = Image.merge('RGBA', [Image.new('L', (700, 700), 255)] * 3 + [lm])
rgba.save(OUT + 'magic-light.webp', lossless=True, method=6)

# ---- snake skin mask: scales that catch a slow travelling glint ----
skin_zone = np.zeros((W, W))
for pts in [
    # head and neck, down to the crate
    [(605, 430), (640, 393), (700, 382), (765, 386), (815, 415), (826, 462), (800, 505), (760, 545), (748, 600), (746, 642), (700, 648), (656, 642), (652, 580), (668, 520), (700, 482), (742, 462), (758, 444), (728, 428), (690, 440), (650, 470), (612, 468)],
    # left body, from the crate down behind the Maya bag
    [(252, 690), (298, 648), (362, 638), (378, 660), (372, 702), (338, 716), (322, 760), (328, 820), (322, 852), (300, 855), (248, 855), (242, 800), (247, 730)],
    # right-hand loop
    [(1040, 640), (1080, 603), (1152, 603), (1202, 628), (1220, 690), (1207, 762), (1152, 797), (1080, 792), (1040, 772), (1040, 700)],
]:
    skin_zone = np.maximum(skin_zone, poly_mask(pts, 2))
skin = A * skin_zone * (1 - erase_tip) * (1 - erase_tongue) * (1 - fuse_zone)
sm = Image.fromarray(np.clip(skin * 255, 0, 255).astype(np.uint8)).resize((700, 700), Image.LANCZOS)
Image.merge('RGBA', [Image.new('L', (700, 700), 255)] * 3 + [sm]).save(OUT + 'magic-skin.webp', lossless=True, method=6)


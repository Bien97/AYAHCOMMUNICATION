<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Validation\ValidationException;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();

        // Liste statique des noms d'icônes Bootstrap (sans "bi bi-")
        $icons = [
    'activity','alarm', 'align-bottom', 'align-center', 'align-end', 'align-middle', 'align-start', 'align-top', 'alt', 'app', 'archive',
    'arrow-90deg-down', 'arrow-90deg-left', 'arrow-90deg-right', 'arrow-90deg-up', 'arrow-bar-down', 'arrow-bar-left', 'arrow-bar-right',
    'arrow-bar-up', 'arrow-clockwise', 'arrow-counterclockwise', 'arrow-down', 'arrow-left', 'arrow-right', 'arrow-up', 'arrows-angle-contract',
    'arrows-angle-expand', 'arrows-collapse', 'arrows-expand', 'arrows-move', 'aspect-ratio', 'at', 'award', 'back', 'badge-3d',
    'badge-4k', 'badge-8k', 'badge-ad', 'badge-ar', 'badge-cc', 'badge-hd', 'badge-tm', 'badge-vo', 'badge-vr', 'badge-wc',
    'bag', 'bag-check', 'bag-dash', 'bag-fill', 'bag-plus', 'bag-x', 'balloon', 'balloon-fill', 'bank', 'bar-chart',
    'bar-chart-fill', 'basket', 'basket-fill', 'basket2', 'basket2-fill', 'basket3', 'basket3-fill', 'battery', 'battery-charging',
    'battery-full', 'battery-half', 'battery-low', 'bell', 'bell-fill', 'bell-slash', 'bell-slash-fill', 'bezier', 'bezier2',
    'bicycle', 'binoculars', 'binoculars-fill', 'blockquote-left', 'blockquote-right', 'book', 'book-fill', 'bookmark', 'bookmark-check',
    'bookmark-check-fill', 'bookmark-dash', 'bookmark-dash-fill', 'bookmark-fill', 'bookmark-heart', 'bookmark-heart-fill', 'bookmark-plus',
    'bookmark-plus-fill', 'bookmark-star', 'bookmark-star-fill', 'bookmark-x', 'bookmark-x-fill', 'bookmarks', 'bookmarks-fill', 'bookshelf',
    'boombox', 'boombox-fill', 'bootstrap', 'bootstrap-fill', 'bootstrap-reboot', 'border', 'border-all', 'border-bottom',
    'border-center', 'border-inner', 'border-left', 'border-middle', 'border-outer', 'border-right', 'border-style', 'border-top',
    'border-width', 'bounding-box', 'bounding-box-circles', 'box', 'box-arrow-down', 'box-arrow-down-left', 'box-arrow-down-right',
    'box-arrow-in-down', 'box-arrow-in-down-left', 'box-arrow-in-down-right', 'box-arrow-in-left', 'box-arrow-in-right', 'box-arrow-in-up',
    'box-arrow-in-up-left', 'box-arrow-in-up-right', 'box-arrow-left', 'box-arrow-right', 'box-arrow-up', 'box-arrow-up-left',
    'box-arrow-up-right', 'box-seam', 'boxes', 'braces', 'brackets', 'brightness-alt-high', 'brightness-alt-high-fill', 'brightness-low',
    'brightness-low-fill', 'broadcast', 'brush', 'brush-fill', 'bucket', 'bucket-fill', 'bug', 'bug-fill', 'building', 'building-add',
    'building-check', 'building-dash', 'building-exclamation', 'building-fill', 'building-fill-check', 'building-fill-dash',
    'building-fill-exclamation', 'building-fill-gear', 'building-fill-lock', 'building-fill-slash', 'building-fill-up', 'building-fill-x',
    'building-gear', 'building-lock', 'building-slash', 'building-up', 'building-x', 'bullseye', 'calculator', 'calendar',
    'calendar-check', 'calendar-check-fill', 'calendar-date', 'calendar-day', 'calendar-event', 'calendar-fill', 'calendar-minus',
    'calendar-minus-fill', 'calendar-month', 'calendar-plus', 'calendar-plus-fill', 'calendar-range', 'calendar-range-fill',
    'calendar-week', 'calendar4-week','calendar-week-fill', 'calendar-x', 'calendar-x-fill', 'camera', 'camera-fill', 'camera-reels', 'camera-reels-fill',
    'camera-video', 'camera-video-fill', 'camera-video-off', 'camera-video-off-fill', 'capslock', 'capslock-fill', 'card-checklist',
    'card-heading', 'card-image', 'card-list', 'card-text', 'caret-down', 'caret-down-fill', 'caret-left', 'caret-left-fill',
    'caret-right', 'caret-right-fill', 'caret-up', 'caret-up-fill', 'cart', 'cart-check', 'cart-check-fill', 'cart-dash',
    'cart-dash-fill', 'cart-fill', 'cart-plus', 'cart-plus-fill', 'cart-x', 'cart-x-fill', 'cash', 'cash-coin', 'cash-stack',
    'chat', 'chat-dots', 'chat-dots-fill', 'chat-fill', 'chat-heart', 'chat-heart-fill', 'chat-left', 'chat-left-dots',
    'chat-left-dots-fill', 'chat-left-fill', 'chat-left-heart', 'chat-left-heart-fill', 'chat-left-text', 'chat-left-text-fill',
    'chat-quote', 'chat-quote-fill', 'chat-right', 'chat-right-dots', 'chat-right-dots-fill', 'chat-right-fill', 'chat-right-heart',
    'chat-right-heart-fill', 'chat-right-text', 'chat-right-text-fill', 'chat-square', 'chat-square-dots', 'chat-square-dots-fill',
    'chat-square-fill', 'chat-square-heart', 'chat-square-heart-fill', 'chat-square-text', 'chat-square-text-fill', 'chat-text',
    'chat-text-fill', 'check', 'check-all', 'check-circle', 'check-circle-fill', 'check-lg', 'check-square', 'check-square-fill',
    'check2', 'check2-all', 'check2-circle', 'check2-square', 'chevron-bar-contract', 'chevron-bar-down', 'chevron-bar-expand',
    'chevron-bar-left', 'chevron-bar-right', 'chevron-bar-up', 'chevron-compact-down', 'chevron-compact-left', 'chevron-compact-right',
    'chevron-compact-up', 'chevron-contract', 'chevron-double-down', 'chevron-double-left', 'chevron-double-right', 'chevron-double-up',
    'chevron-down', 'chevron-left', 'chevron-right', 'chevron-up', 'circle', 'circle-fill', 'circle-half', 'circle-square', 'clipboard',
    'clipboard-check', 'clipboard-data', 'clipboard-fill', 'clipboard-heart', 'clipboard-minus', 'clipboard-plus', 'clipboard-x',
    'clock', 'clock-fill', 'clock-history', 'cloud', 'cloud-arrow-down', 'cloud-arrow-up', 'cloud-check', 'cloud-download',
    'cloud-drizzle', 'cloud-fill', 'cloud-fog', 'cloud-fog2', 'cloud-hail', 'cloud-haze', 'cloud-haze2', 'cloud-lightning',
    'cloud-lightning-rain', 'cloud-minus', 'cloud-moon', 'cloud-plus', 'cloud-rain', 'cloud-rain-heavy', 'cloud-snow', 'cloud-sun',
    'cloud-upload', 'code', 'code-slash', 'code-square', 'coin', 'collection', 'collection-fill', 'columns', 'command', 'comment',
    'comment-dots', 'comment-dots-fill', 'comment-fill', 'comment-heart', 'comment-heart-fill', 'comment-medical', 'comment-medical-fill',
    'comment-text', 'comment-text-fill', 'comment-video', 'comment-video-fill', 'cone', 'cone-striped', 'controller', 'cpu',
    'cpu-fill', 'credit-card', 'credit-card-2-back', 'credit-card-2-front', 'credit-card-fill', 'crop', 'cup', 'cup-fill',
    'cursor', 'cursor-fill', 'dash', 'dash-circle', 'dash-circle-fill', 'database', 'device-hdd', 'device-hdd-fill', 'device-ssd',
    'device-ssd-fill', 'diagram-2', 'diagram-2-fill', 'diagram-3', 'diagram-3-fill', 'diamond', 'diamond-fill', 'dice-1', 'dice-2',
    'dice-3', 'dice-4', 'dice-5', 'dice-6', 'disc', 'disc-fill', 'display', 'display-fill', 'displayport', 'distribute-horizontal',
    'distribute-vertical', 'door-closed', 'door-open', 'dot', 'download', 'droplet', 'droplet-fill', 'ear', 'ear-fill', 'earbuds',
    'easel', 'easel-fill', 'egg', 'egg-fill', 'egg-fried', 'eject', 'emoji-angry', 'emoji-dizzy', 'emoji-expressionless',
    'emoji-frown', 'emoji-heart-eyes', 'emoji-laughing', 'emoji-neutral', 'emoji-smile', 'emoji-smile-upside-down', 'emoji-sunglasses',
    'emoji-wink', 'envelope', 'envelope-fill', 'envelope-open', 'envelope-open-fill', 'equal', 'eraser', 'eraser-fill', 'exclamation',
    'exclamation-circle', 'exclamation-diamond', 'exclamation-octagon', 'exclamation-square', 'exclamation-triangle', 'exclude',
    'explicit', 'eye', 'eye-fill', 'eye-slash', 'eye-slash-fill', 'eyedropper', 'eyedropper-fill', 'eyeglasses', 'facebook',
    'file', 'file-arrow-down', 'file-arrow-up', 'file-bar-graph', 'file-binary', 'file-break', 'file-check', 'file-code', 'file-diff',
    'file-earmark', 'file-earmark-arrow-down', 'file-earmark-arrow-up', 'file-earmark-bar-graph', 'file-earmark-binary',
    'file-earmark-break', 'file-earmark-check', 'file-earmark-code', 'file-earmark-diff', 'file-earmark-easel', 'file-earmark-excel',
    'file-earmark-fill', 'file-earmark-font', 'file-earmark-image', 'file-earmark-lock', 'file-earmark-lock2', 'file-earmark-medical',
    'file-earmark-minus', 'file-earmark-music', 'file-earmark-pdf', 'file-earmark-person', 'file-earmark-play', 'file-earmark-plus',
    'file-earmark-post', 'file-earmark-ppt', 'file-earmark-richtext', 'file-earmark-ruled', 'file-earmark-slides', 'file-earmark-spreadsheet',
    'file-earmark-text', 'file-earmark-word', 'file-earmark-x', 'file-earmark-zip', 'file-excel', 'file-excel-fill', 'file-fill',
    'file-font', 'file-image', 'file-lock', 'file-lock2', 'file-medical', 'file-medical-fill', 'file-minus', 'file-music',
    'file-pdf', 'file-pdf-fill', 'file-person', 'file-play', 'file-play-fill', 'file-plus', 'file-post', 'file-ppt', 'file-ppt-fill',
    'file-richtext', 'file-ruled', 'file-slides', 'file-spreadsheet', 'file-spreadsheet-fill', 'file-text', 'file-word', 'file-word-fill',
    'file-x', 'file-zip', 'files', 'files-alt', 'film', 'filter', 'filter-circle', 'filter-circle-fill', 'filter-left', 'filter-right',
    'filter-square', 'filter-square-fill', 'flag', 'flag-fill', 'flower1', 'folder', 'folder-check', 'folder-fill', 'folder-minus',
    'folder-plus', 'folder-symlink', 'folder-symlink-fill', 'folder-x', 'folder2', 'folder2-open', 'fonts', 'forward', 'forward-fill',
    'front', 'fullscreen', 'fullscreen-exit', 'funnel', 'funnel-fill', 'gear', 'gear-fill', 'gear-wide', 'gear-wide-connected',
    'gem', 'gender-ambiguous', 'gender-female', 'gender-male', 'gender-trans', 'geo', 'geo-alt', 'geo-alt-fill', 'gift', 'gift-fill',
    'git', 'github', 'globe', 'globe-americas', 'globe-asia-australia', 'globe-central-south-asia', 'globe-europe-africa', 'globe2',
    'google', 'graph-down', 'graph-down-arrow', 'graph-up', 'graph-up-arrow', 'grid', 'grid-1x2', 'grid-3x2', 'grid-3x2-gap',
    'grid-3x3', 'grid-3x3-gap', 'grip-horizontal', 'grip-vertical', 'hammer', 'hand-index', 'hand-index-fill', 'hand-thumbs-down',
    'hand-thumbs-down-fill', 'hand-thumbs-up', 'hand-thumbs-up-fill', 'handbag', 'handbag-fill', 'hash', 'hdd', 'hdd-fill',
    'hdmi', 'headphones', 'headset', 'heart', 'heart-fill', 'heart-half', 'heartbreak', 'heartpulse', 'hearts', 'heptagon',
    'heptagon-fill', 'hexagon', 'hexagon-fill', 'hourglass', 'hourglass-bottom', 'hourglass-split', 'hourglass-top', 'house',
    'house-door', 'house-door-fill', 'house-fill', 'house-heart', 'house-heart-fill', 'hourglass-bottom', 'hourglass-split',
    'hourglass-top', 'hourglass', 'hourglass-end', 'hourglass-start', 'house', 'house-door', 'house-door-fill', 'house-fill',
    'house-heart', 'house-heart-fill', 'hourglass-bottom', 'hourglass-split', 'hourglass-top', 'hourglass-end', 'hourglass-start',
    'hurricane', 'hypnotize', 'image', 'image-alt', 'image-fill', 'images', 'inbox', 'inbox-fill', 'inboxes', 'inboxes-fill',
    'infinity', 'info', 'info-circle', 'info-square', 'input-cursor', 'input-cursor-text', 'instagram', 'intersect', 'journal',
    'journal-album', 'journal-arrow-down', 'journal-arrow-up', 'journal-bookmark', 'journal-bookmark-fill', 'journal-check',
    'journal-code', 'journal-medical', 'journal-minus', 'journal-plus', 'journal-richtext', 'journal-text', 'journal-x', 'journals',
    'joystick', 'justify', 'justify-left', 'justify-right', 'kanban', 'key', 'key-fill', 'keyboard', 'keyboard-fill', 'ladder',
    'lamp', 'lamp-fill', 'laptop', 'layer-backward', 'layer-forward', 'layout-sidebar', 'layout-sidebar-inset', 'layout-text-sidebar',
    'layout-text-window', 'layout-three-columns', 'life-preserver', 'lightbulb', 'lightbulb-fill', 'lightning', 'lightning-fill',
    'line', 'link', 'link-45deg', 'linkedin', 'list', 'list-check', 'list-nested', 'list-ol', 'list-stars', 'list-task', 'list-ul',
    'lock', 'lock-fill', 'mailbox', 'mailbox2', 'map', 'map-fill', 'markdown', 'markdown-fill', 'mask', 'mask-heart', 'mask-heart-fill',
    'mask-ventilator', 'mask-ventilator-fill', 'masks', 'masks-theater', 'masks-theater-fill', 'math', 'medium', 'megaphone',
    'megaphone-fill', 'memory', 'menu-button', 'menu-button-fill', 'menu-button-wide', 'menu-button-wide-fill', 'menu-down', 'menu-up',
    'messenger', 'mic', 'mic-fill', 'mic-mute', 'mic-mute-fill', 'microscope', 'minecart', 'minecart-loaded', 'modem', 'moisture',
    'moon', 'moon-fill', 'mouse', 'mouse-fill', 'mouse2', 'mouse2-fill', 'mouse3', 'mouse3-fill', 'music-note', 'music-note-beamed',
    'music-player', 'music-player-fill', 'newspaper', 'node-minus', 'node-plus', 'nut', 'octagon', 'octagon-fill', 'option',
    'outlet', 'paint-bucket', 'palette', 'palette-fill', 'palette2', 'paperclip', 'paragraph', 'patch-check', 'patch-check-fill',
    'patch-exclamation', 'patch-exclamation-fill', 'patch-minus', 'patch-minus-fill', 'patch-plus', 'patch-plus-fill', 'patch-question',
    'patch-question-fill', 'pause', 'pause-btn', 'pause-btn-fill', 'pause-circle', 'pause-circle-fill', 'paypal', 'pc', 'pc-display',
    'pc-display-horizontal', 'pc-horizontal', 'pen', 'pen-fill', 'pencil', 'pencil-fill', 'pentagon', 'pentagon-fill', 'people',
    'people-fill', 'percent', 'person', 'person-bounding-box', 'person-check', 'person-check-fill', 'person-circle', 'person-dash',
    'person-dash-fill', 'person-fill', 'person-lines-fill', 'person-plus', 'person-plus-fill', 'person-square', 'person-x',
    'person-x-fill', 'phone', 'phone-fill', 'phone-flip', 'phone-landscape', 'phone-vibrate', 'pie-chart', 'pie-chart-fill',
    'pin', 'pin-angle', 'pin-angle-fill', 'pin-fill', 'pin-map', 'pin-map-fill', 'pip', 'pip-fill', 'play', 'play-btn', 'play-btn-fill',
    'play-circle', 'play-circle-fill', 'plug', 'plug-fill', 'plus', 'plus-circle', 'plus-lg', 'plus-square', 'plus-square-dotted',
    'plus-square-fill', 'postage', 'postage-fill', 'postage-heart', 'postage-heart-fill', 'postcard', 'postcard-fill', 'power',
    'printer', 'printer-fill', 'projector', 'puzzle', 'puzzle-fill', 'question', 'question-circle', 'question-diamond', 'question-octagon',
    'question-square', 'quote', 'r-circle', 'r-circle-fill', 'r-square', 'r-square-fill', 'radio', 'rain', 'receipt', 'receipt-cutoff',
    'reception-0', 'reception-1', 'reception-2', 'reception-3', 'reception-4', 'record', 'record-btn', 'record-btn-fill', 'record-circle',
    'record-circle-fill', 'record-fill', 'recycle', 'reddit', 'repeat', 'repeat-1', 'reply', 'reply-all', 'reply-all-fill', 'reply-fill',
    'rss', 'rss-fill', 'rulers', 'safe', 'safe-fill', 'safe2', 'safe2-fill', 'save', 'save-fill', 'save2', 'save2-fill', 'scissors',
    'screwdriver', 'search', 'search-heart', 'search-heart-fill', 'segmented-nav', 'send', 'send-check', 'send-check-fill', 'send-exclamation',
    'send-exclamation-fill', 'send-fill', 'send-plus', 'send-plus-fill', 'send-slash', 'send-slash-fill', 'send-x', 'send-x-fill',
    'server', 'share', 'share-fill', 'shield', 'shield-check', 'shield-exclamation', 'shield-fill', 'shield-fill-check',
    'shield-fill-exclamation', 'shield-fill-minus', 'shield-fill-plus', 'shield-fill-x', 'shield-lock', 'shield-minus', 'shield-plus',
    'shield-shaded', 'shield-slash', 'shield-x', 'shift', 'shift-fill', 'shop', 'shop-window', 'shuffle', 'signpost', 'signpost-2',
    'signpost-2-fill', 'signpost-fill', 'signpost-split', 'signpost-split-fill', 'sim', 'sim-fill', 'skip-backward', 'skip-backward-btn',
    'skip-backward-btn-fill', 'skip-backward-circle', 'skip-backward-circle-fill', 'skip-forward', 'skip-forward-btn', 'skip-forward-btn-fill',
    'skip-forward-circle', 'skip-forward-circle-fill', 'slash', 'sliders', 'smartwatch', 'smartwatch-display', 'snow', 'snow2', 'sort-alpha-down',
    'sort-alpha-down-alt', 'sort-alpha-up', 'sort-alpha-up-alt', 'sort-down', 'sort-numeric-down', 'sort-numeric-down-alt', 'sort-numeric-up',
    'sort-numeric-up-alt', 'sort-up', 'speaker', 'speaker-fill', 'speedometer', 'speedometer2', 'spellcheck', 'square', 'square-fill',
    'square-half', 'stack', 'star', 'star-fill', 'star-half', 'stars', 'stickies', 'stickies-fill', 'sticky', 'sticky-fill', 'stop',
    'stop-btn', 'stop-btn-fill', 'stop-circle', 'stop-circle-fill', 'stoplights', 'stoplights-fill', 'stopwatch', 'stopwatch-fill',
    'subtract', 'suit-club', 'suit-diamond', 'suit-heart', 'suit-spade', 'sun', 'sun-fill', 'sunrise', 'sunrise-fill', 'sunset',
    'sunset-fill', 'symmetry-horizontal', 'symmetry-vertical', 'tablet', 'tablet-fill', 'tablet-landscape', 'tablet-landscape-fill',
    'tag', 'tag-fill', 'tags', 'tags-fill', 'telephone', 'telephone-fill', 'telephone-forward', 'telephone-forward-fill', 'telephone-inbound',
    'telephone-inbound-fill', 'telephone-minus', 'telephone-minus-fill', 'telephone-outbound', 'telephone-outbound-fill', 'telephone-plus',
    'telephone-plus-fill', 'telephone-x', 'telephone-x-fill', 'terminal', 'terminal-fill', 'text-center', 'text-indent-left', 'text-indent-right',
    'text-left', 'text-paragraph', 'text-right', 'textarea', 'textarea-resize', 'textarea-t', 'thermometer', 'thermometer-snow', 'thermometer-sun',
    'three-dots', 'three-dots-vertical', 'toggle-off', 'toggle-on', 'toggles', 'toggles2', 'tools', 'toggle', 'translate', 'trash', 'trash-fill',
    'trash2', 'trash2-fill', 'tree', 'tree-fill', 'trophy', 'trophy-fill', 'tropical-storm', 'truck', 'truck-flatbed', 'tsunami', 'tv', 'tv-fill',
    'twitch', 'twitter', 'type-bold', 'type-h1', 'type-h2', 'type-h3', 'type-italic', 'type-strikethrough', 'type-underline', 'type',
    'ui-checks', 'ui-checks-grid', 'umbrella', 'umbrella-fill', 'union', 'unlock', 'unlock-fill', 'upc', 'upc-scan', 'upload', 'vector-pen',
    'view-list', 'view-stacked', 'vinyl', 'vinyl-fill', 'virus', 'virus2', 'voicemail', 'volume-down', 'volume-mute', 'volume-off',
    'volume-up', 'wallet', 'wallet-fill', 'wallet2', 'watch', 'water', 'webcam', 'webcam-fill', 'wechat', 'whatsapp', 'wifi', 'wifi-1',
    'wifi-2', 'wifi-off', 'wind', 'window', 'window-dash', 'window-desktop', 'window-dock', 'window-fullscreen', 'window-plus', 'window-sidebar',
    'window-split', 'window-stack', 'window-x', 'wordpress', 'wrench', 'x', 'x-circle', 'x-circle-fill', 'x-diamond', 'x-octagon',
    'x-square', 'x-square-fill', 'youtube', 'zoom-in', 'zoom-out',
    ];

        return view('admin.services', compact('services', 'icons'));
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'icon' => 'required|string|max:255',
                'image' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            ], [
                'title.required' => 'Le titre est obligatoire.',
                'title.string' => 'Le titre doit être une chaîne de caractères.',
                'title.max' => 'Le titre ne peut pas dépasser 255 caractères.',

                'description.required' => 'La description est obligatoire.',
                'description.string' => 'La description doit être une chaîne de caractères.',

                'icon.required' => 'L\'icône est obligatoire.',
                'icon.string' => 'L\'icône doit être une chaîne de caractères.',
                'icon.max' => 'L\'icône ne peut pas dépasser 255 caractères.',

                'image.image' => 'Le fichier doit être une image.',
                'image.mimes' => 'L\'image doit être au format JPG, JPEG, PNG ou SVG.',
                'image.max' => 'L\'image ne peut pas dépasser 2 Mo.',
            ]);

            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('services', 'public');
            }

            Service::create($data);

            return back()->with('success', 'Service ajouté avec succès.');

        } catch (ValidationException $e) {
            // Redirige avec les erreurs de validation
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            // Autre erreur possible (ex : problème stockage)
            return back()->with('error', 'Une erreur est survenue : ' . $e->getMessage())->withInput();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $service = Service::findOrFail($id);

            $data = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'icon' => 'required|string|max:255',
                'image' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            ], [
                'title.required' => 'Le titre est obligatoire.',
                'title.string' => 'Le titre doit être une chaîne de caractères.',
                'title.max' => 'Le titre ne peut pas dépasser 255 caractères.',

                'description.required' => 'La description est obligatoire.',
                'description.string' => 'La description doit être une chaîne de caractères.',

                'icon.required' => 'L\'icône est obligatoire.',
                'icon.string' => 'L\'icône doit être une chaîne de caractères.',
                'icon.max' => 'L\'icône ne peut pas dépasser 255 caractères.',

                'image.image' => 'Le fichier doit être une image.',
                'image.mimes' => 'L\'image doit être au format JPG, JPEG, PNG ou SVG.',
                'image.max' => 'L\'image ne peut pas dépasser 2 Mo.',
            ]);

            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('services', 'public');
            }

            $service->update($data);

            return back()->with('success', 'Service mis à jour avec succès.');

        } catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return back()->with('error', 'Une erreur est survenue : ' . $e->getMessage())->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            Service::destroy($id);
            return back()->with('success', 'Service supprimé avec succès.');
        } catch (\Exception $e) {
            return back()->with('error', 'Impossible de supprimer le service : ' . $e->getMessage());
        }
    }
}




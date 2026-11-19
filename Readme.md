# UpAssist.MegaMenu

A mega menu for [Neos](https://neos.io): editors build the site menu (items, columns and labels) in a dedicated "Menu" edit mode, and the package renders it as a `<nav>`.

Full documentation: https://upassist.github.io/megamenu/

## Installation

```bash
composer require upassist/megamenu:^2.0   # Neos 9
composer require upassist/megamenu:^0.5   # Neos 8
```

Add the `UpAssist.MegaMenu:Mixin.Menu` mixin to your site (homepage) NodeType and render `UpAssist.MegaMenu:Collection.Menu` where the menu belongs.

## Compatibility

| Version | Branch | Neos |
| --- | --- | --- |
| 2.x | `main` | 9.0, 9.1, 9.2 |
| 1.0.0 | - | do not use: Neos 9 Fusion with Neos 8 PHP |
| 0.5.x | `0.x` | 8.3, 8.4 |

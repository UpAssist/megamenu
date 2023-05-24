---
icon: globe
---

# UpAssist Mega Menu

!!! 
🚀 Add a node based mega menu to your Neos website with ease and usability in mind
!!!

## What does it do?
This package provides a way to add a mega menu to your Neos website.

It creates a childNode where menu items can be added. Submenu's can be created by adding 
menu items, and optionally labels and columns.

### PreviewMode
This package comes with a previewMode for easier editing the menu.

![](Images/previewmode.png)

## Installation
Add the package to your Site package.

Install using composer: 

```bash
composer require --no-update upassist/megamenu
```

If all goes well, run 

```bash
composer update upassist/megamenu
```

## Setup
Add the mixin `UpAssist.MegaMenu:Mixin.Menu` to your home page definition.

Next run the node repair command to create the proper childNode.

```bash
./flow node:repair
```

Finish by implementing your styles.

### Set your own base class
You can change the class name that is used as a base to override the default classes.
```yaml
UpAssist:
  MegaMenu:
    defaultClasses:
      menu: 'menu'
```

## Optional

### Overriding protoTypes
This menu is set up using Fusion AFX. If you want to override the implementation in your project, you are
completely free to do so.

### Adding a Menu handler / toggle
A handler component (to toggle the menu) is available as well: `UpAsssist.MegaMenu:Component.Molecule.Menu.Handler`. You
can use this to set up toggling if you want.

### Implementing state changes for hashing
Make sure to add the provided JavaScript to your page to update states for you menu when you have hashes you link to:

```javascript
afx`
    <script src={StaticResource.uri('UpAssist.MegaMenu', 'Public/js/menuhelper.js')}></script>
`
```

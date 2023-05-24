const updateMenuItemsState = () => {
	const menus = document.querySelectorAll('[data-menu]')
	menus?.forEach(menu => {
		let anchors = menu.querySelectorAll('a')
		anchors?.forEach(anchor => {
			if (anchor.href.indexOf(window.location.hash) > 0) {
				anchor.parentElement.classList.add(`${menu.dataset.menu}__item--active`)
				anchor.parentElement.classList.remove(`${menu.dataset.menu}__item--normal`)
			} else {
				anchor.parentElement.classList.remove(`${menu.dataset.menu}__item--active`)
				anchor.parentElement.classList.add(`${menu.dataset.menu}__item--normal`)
			}
		})
	})
}

window.addEventListener("DOMContentLoaded", e => {
	updateMenuItemsState()
})

window.addEventListener("hashchange", e => {
	updateMenuItemsState()
})

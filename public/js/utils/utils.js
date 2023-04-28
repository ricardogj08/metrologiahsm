export const insertHTML = (el, html) => el.insertAdjacentHTML('afterbegin', html)

// CSS classes
export function toggleCSSclasses (element, classes = []) {
  classes.map(itemClass => element.classList.toggle(itemClass))
}

export function removeCSSclasses (element, classes = []) {
  classes.map(itemClass => element.classList.remove(itemClass))
}

export function addCSSclasses (element, classes = []) {
  classes.map(itemClass => element.classList.add(itemClass))
}

// Replace html and insert another
export const replaceHTML = (el, html) => {
  el.replaceChildren()
  insertHTML(el, html)
}

// Get the url hash
export const getURLHash = () => document.location.hash

// Select an element/s from html
export const $ = ({
  element = document,
  selector,
  multiple = false
}) => {
  return multiple ? element.querySelectorAll(selector) : element.querySelector(selector)
}

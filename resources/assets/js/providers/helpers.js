/*
 |--------------------------------------------------------------------------
 | Helpers
 |--------------------------------------------------------------------------
 */

/** Capitalize */
String.prototype.capitalize = function () {
    return this.charAt(0).toUpperCase() + this.slice(1)
}

/** Deep copy */
window.deepCopy = function (o) {
    return JSON.parse(JSON.stringify(o))
}

/** Format price */
window.price_format = function (number, n = 2, x, s, c) {
    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\D' : '$') + ')',
        num = number.toFixed(Math.max(0, ~~n))

    return '$' + (c ? num.replace('.', c) : num).replace(new RegExp(re, 'g'), '$&' + (s || ','))
}

/** Debounce */
window.debounce = function (func, wait, immediate) {
	var timeout
	return function() {
		var context = this, args = arguments
		var later = function() {
			timeout = null
			if (!immediate) func.apply(context, args)
		}
		var callNow = immediate && !timeout
		clearTimeout(timeout)
		timeout = setTimeout(later, wait)
		if (callNow) func.apply(context, args)
	}
}
/**
 * Template Name: Paces - Admin & Dashboard Template
 * By (Author): Coderthemes
 * Module/App (File Name): Plugins Masonry
 */

setTimeout(() => {
    document.querySelectorAll("[data-masonry]").forEach((grid) => {
        new Masonry(grid, JSON.parse(grid.getAttribute("data-masonry")))
    })
}, 100)

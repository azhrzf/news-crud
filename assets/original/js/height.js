const width = document.querySelector(".get-width").offsetHeight

const setWidth = document.querySelectorAll(".get-div")

const rgbRand = () => {
    return `rgb(${Math.random() * 256}, ${Math.random() * 256}, ${Math.random() * 256})`
}

setWidth.forEach(element => {
    element.setAttribute("style", `height:${width}px; background-image:linear-gradient(160deg, ${rgbRand()} 0%, ${rgbRand()} 100%);`)
})
(function () {
    const eventHandler = (e) => {
        if (e.altKey && e.ctrlKey && 'KeyS' === e.code) {
            const button = document.querySelector('button.editor-post-publish-button')
            if (button && !button.disabled) {
                button.dispatchEvent(new MouseEvent('click', {
                    bubbles: true,
                    cancelable: true,
                    view: window,
                }))
            }
        }
    }

    document.addEventListener('keyup', eventHandler, {
        capture: true,
    })

    document.getElementById('editor').addEventListener('keydown', eventHandler, {
        capture: true,
    })
})()

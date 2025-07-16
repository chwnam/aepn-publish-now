(function () {
    const clickPublish = () => {
        const button = document.querySelector('button.editor-post-publish-button')
        console.log(button)
        if (button && !button.disabled) {
            button.dispatchEvent(new MouseEvent('click', {
                bubbles: true,
                cancelable: true,
                view: window,
            }))
            return true
        }
        return false
    }

    const openPanel = () => {
        const panelButton = document.querySelector('button.editor-post-publish-panel__toggle')
        if (panelButton && !panelButton.disabled) {
            panelButton.dispatchEvent(new MouseEvent('click', {
                bubbles: true,
                cancelable: true,
                view: window,
            }))
            return true
        }
        return false
    }

    const eventHandler = (e) => {
        if (e.altKey && e.ctrlKey && 'KeyS' === e.code) {
            if (openPanel()) {
                // Panel is open. Click publish button.
                setTimeout(() => {
                    clickPublish()
                }, 1500)
            } else {
                // Panel is not present. Click publish button.
                clickPublish()
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

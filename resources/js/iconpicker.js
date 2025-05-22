export function resolveElement(val) {
    if (val instanceof HTMLElement) {
        return val;
    } else if (typeof val === 'string') {
        return document.querySelector(val);
    }

    return null;
}

class IconPicker {
    _eventListeners = {
        select: [],
        show: [],
        hide: []
    };

    constructor(el, modal) {
        this.element = resolveElement(el);
        this.modal = resolveElement(modal);
        this.icons = this.modal.querySelectorAll('.icon');
        this.selectedContainer = resolveElement('.icon-picker-selected');

        if (this.element && this.modal) {
            this._bindEvents();
        }
    }

    _bindEvents() {
        this.addEvent(this.element, 'click', () => this.show());
        this.addEvent(this.modal, 'click', e => {
            if (e.target.classList.contains('icon')) {
                this.selectIcon(e.target);
                this.updateInputWithValue(e.target.getAttribute('data-id'));
                this.show();
            }
        });
    }

    addEvent(element, event, handler) {
        element.addEventListener(event, handler);
    }

    show() {
        this.modal.classList.toggle('is-visible');
        this._trigger('show');
        return this;
    }

    // hide() {
    //     if (this.isOpen()) {
    //         this.modal.classList.remove('is-visible');
    //         this._trigger('hide');
    //         return this;
    //     }
    //     return false;
    // }

    isOpen() {
        return this.modal.classList.contains('is-visible');
    }

    selectIcon(icon) {
        this._trigger('select', icon);
    }

    updateInputWithValue(value) {
        this.selectedContainer.innerHTML = `<em class="icon ni ${value}"></em>`;
        this.element.value = value;
    }

    on(event, callback) {
        if (this._eventListeners[event]) {
            this._eventListeners[event].push(callback);
        }
    }

    _trigger(event, data) {
        if (this._eventListeners[event]) {
            this._eventListeners[event].forEach(callback => callback(data));
        }
    }
}

new IconPicker('#icon-picker', '#icon-picker-modal');

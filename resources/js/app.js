const Log = require("laravel-mix/src/Log");
const { forEach } = require("lodash")

const handleSwitch = document.querySelectorAll('[data-id="switch-visibility"]')

if(handleSwitch.length > 0){

    function switchVisibility(element) {
        let nextSibling = element.parentElement.nextElementSibling
        nextSibling.classList.toggle("d-none")
    };
    
    handleSwitch.forEach((element) => {
        element.addEventListener("click", () => {
            switchVisibility(element);
        });
    });
}

const selectVisibility = document.querySelector('[data-id="select-visibility"]')
const selectVisibilityOptions = document.querySelectorAll('[data-id="select-visibility-options"]')
if(selectVisibility){
    selectVisibility.addEventListener('change', (e) => {
        let value = e.target.value
        selectVisibilityOptions.forEach((element) => {
            if(element.id === value){
                element.classList.remove("d-none")
                element.classList.add("d-block")
            }else{
                element.classList.add("d-none")
                element.classList.remove("d-block")
            }
        })
    })
}

const form__domain = document.querySelector('[data-id="form__domain"]')
const submit__domain = document.querySelector('[data-id="btn__add__domain"]')

function create_row(data){
    let tb__domain = document.querySelector("[data-id='tb__domain']")

    let html = '<tr class="tb-odr-item">'
    html += `<td class="tb-odr-amount">`
    html += `<span class="tb-odr-total"><span class="amount">${data}</span></span>`
    html += '<span class="tb-odr-status"><span class="badge badge-dot bg-success">Verificado</span></span>'
    html += '</td>'
    html += '<td class="tb-odr-action"><a href="/demo1/invoice-details.html" class="btn btn-pd-auto d-sm-none"><em class="icon ni ni-chevron-right"></em></a></td>'
    html += '</tr>'

    tb__domain.innerHTML += html
}

if(form__domain){
    const domain = document.getElementById("domain").value;

    submit__domain.addEventListener('click', (e) => {
        e.preventDefault()
        let domain = document.getElementById("domain").value
        let buttom = document.getElementById("btn__add__domain")

        let data = {
            domain
        };

        let options = {
            headers: {'Content-Type': 'application/json', 'Accept': 'application/json', 'Client-Name': 'Action'},
            method: 'POST',
            body: JSON.stringify(data)
        };

        fetch(`/domains/add`, options)
        .then(response => { 
            if (response.ok) {
                return response.json()
            } else {
                throw new Error(`HTTP error ${response.status}`)
            }
        })
        .then(data => {
            toastr.clear();
            NioApp.Toast(data.message, 'success', {position: 'top-center'})
            buttom.classList.add("disabled")
            create_row(data.domain)
        })
        .catch(error => {
            //
        });
    })
}

document.addEventListener('click', (e) => {
    setTimeout(() => {
        let _upload = document.querySelector('[data-id="_upload"]')
        let preview = document.getElementById('preview')
        let new_preview_img = document.getElementById('new_preview_img')

        if (!_upload) {
            return
        }

        _upload.addEventListener('change', (e) => {
            var reader = new FileReader();
            let img = document.getElementById('blah')
            
            reader.onload = function(e) {
                preview.classList.add("d-none")
                new_preview_img.setAttribute('src', e.target.result)
            }
            reader.readAsDataURL(_upload.files[0])
        })
    }, 300)
})

// select all checkbox
const toggleAllCheckboxes = (checkboxes, isChecked) => {
    checkboxes.forEach(checkbox => {
        checkbox.checked = isChecked
    })
}

const getSelectedCheckboxes = () => {
    const checkboxes = document.querySelectorAll('.checkbox')
    return [...checkboxes].reduce((acc, checkbox, index) => {
        if (checkbox.checked) acc.push(checkbox.value)
        return acc
    }, [])
}

const userAction = (type, data) => {
    if(data.length === 0) return

    const table = document.querySelector('.table-data')
    fetch('/users/action', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ type, ids: data })
    })
    .then(response => response.text())
    .then(html => {
        table.innerHTML = html
        setupSelectAllCheckbox()
    })
}

const setupSelectAllCheckbox = () => {
    const selectAllCheckbox = document.querySelector('[data-id="checkbox"]')
    const individualCheckboxes = document.querySelectorAll('.checkbox')

    if (!selectAllCheckbox || !individualCheckboxes.length) return

    selectAllCheckbox.addEventListener('click', () => toggleAllCheckboxes(individualCheckboxes, selectAllCheckbox.checked))
    
    individualCheckboxes.forEach(checkbox => 
        checkbox.addEventListener('click', () => {
            if (!checkbox.checked) {
                selectAllCheckbox.checked = false
            }
        })
    );
};

const setupBulkAction = () => {
    const bulkActionSelect = document.querySelector('[data-id="bulk-action"]')
    const bulkActionButton = document.querySelector('[data-id="bulk-action-btn"]')
    let action

    if (!bulkActionSelect) return

    bulkActionSelect.addEventListener('change', (e) => {
        bulkActionButton.removeAttribute("disabled")
        action = e.target.value
    })
    
    bulkActionButton.addEventListener('click', () => {
        const selectedCheckboxes = getSelectedCheckboxes()
        userAction(action, selectedCheckboxes)
    })
};

document.addEventListener('DOMContentLoaded', () => {
    setupSelectAllCheckbox();
    setupBulkAction();
});

function handleElementClick(element, callback) {
    element.addEventListener('click', callback);
}

function fetchAndUpdate(url, data, panels) {
    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(response => response.text())
    .then(html => {
        panels.innerHTML = html;
        commentsActions();
    });
}

function commentsActions() {
    const panels = document.querySelector(`[data-id="panels"]`);

    // Reply textarea
    const dispatchElements = document.querySelectorAll('[data-id="el-dispatch"]');
    dispatchElements.forEach(element => {
        handleElementClick(element, e => {
            const toggleEl = e.target.parentNode.nextElementSibling;
            toggleEl.classList.toggle('d-none');
        });
    });

    // Comment Action
    const commentActions = document.querySelectorAll('#comment_action');
    commentActions.forEach(element => {
        const id = element.getAttribute('data-id');
        const action = element.getAttribute('data-action');
        const tab = element.getAttribute('data-tab');
        const url = `/comments/${id}`;
        handleElementClick(element, () => {
            fetchAndUpdate(url, { action, tab }, panels);
        });
    });

    // Comment Reply
    const commentReplies = document.querySelectorAll('#comment_reply');
    commentReplies.forEach(element => {
        const id = element.getAttribute('data-id');
        const button = element.querySelector('#btn_reply');
        const comment = element.querySelector('.input_reply');
        const url = `comment/reply`;
        handleElementClick(button, () => {
            const value = comment.value;
            fetchAndUpdate(url, { id, value }, panels);
        });
    });
}

function resendStudent() {
    const element = document.getElementById("resend_student_data")

    if (element) {
        element.addEventListener('click', function() {
            let form = document.createElement("form")
            let input = document.createElement("input")
            
            input.name = "student"
            input.value = element.getAttribute('data-id')
            input.type = "hidden"
            form.method = "POST"
            form.action = '/users/student-resend'
            
            form.appendChild(input)
            document.body.appendChild(form)
            
            form.submit()
            document.body.removeChild(form)
        })
    }
}

resendStudent();
commentsActions();





function resolveElement(val) {
    if (val instanceof HTMLElement) {
        return val;
    } else if (typeof val === 'string') {
        return document.querySelector(val);
    }

    return null;
}

let c_modal = document.querySelectorAll(".c-modal");

c_modal.forEach((element) => {
    element.addEventListener('click', () => {
        let progress = element.getAttribute('data-progress')
        let course_name = element.getAttribute('data-name')
        let type = element.getAttribute('data-type')
        let date = element.getAttribute('data-date')
        let percent_message = `Conclua ${progress}% do curso ${course_name} para acessar este conteúdo.`
        let time_message = `Este curso estará disponível a partir de ${date}.`
        
        Swal.fire(
            'Curso não disponível no momento!',
            type == 'percent' ? percent_message : time_message,
            'question'
        )
    })
});

function deleteComment(id){
    const url = `/chapters/comment/${id}/destroy`
    const method = 'DELETE'
    
    fetch(url, {
        method: method,
        headers: {
            'Content-Type': 'application/json'
        },
    })
}

function likeComment(student_id, comment_id, type){
    fetch(`/chapters/comment/${student_id}/${comment_id}/like`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ 'type': type })
    })
    .then(response => {
        console.log(response)
    })
}

function cancelComment(button, container, data){
    button.addEventListener('click', () => {
        container.innerHTML = ''
        container.innerHTML = data
        initComments()
    })
}

function cancelReply(button_cancel, reply_div){
    button_cancel.addEventListener('click', function(){
        reply_div.remove()
    })
}

function commentReply(id, student_id, data){
    fetch(`/chapters/comment/${student_id}/${id}/reply`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ 'comment': data })
    })
    .then(response => {
        console.log(response)
    })
}

function initComments(){
    const comments = document.querySelectorAll('.rm__comments');

    if(comments){
        comments.forEach((element) => {
            const edit = element.querySelector('#rm__edit')
            const del = element.querySelector("#rm__del")
            const reply = element.querySelector("#rm__reply")
            const like = element.querySelector("#rm__like")
            const id = element.getAttribute('data-id')
            const student_id = element.getAttribute('data-student')

            if(del){
                del.addEventListener('click', function(){
                    deleteComment(id)
                    element.remove()
                })
            }

            if(edit){
                edit.addEventListener('click', function(){
                    element.classList.add('is_edit')

                    const container = element.querySelector('.comment__container')
                    let data = container.innerHTML

                    const textarea = document.createElement('textarea')
                    textarea.classList.add('form-control', 'mt-4')
                    textarea.innerHTML = container.textContent.replace(/[\n\r]+|[\s]{2,}/g, ' ').trim()
                    textarea.name = 'comment'
                    textarea.addEventListener('input', function(event) {
                        text = event.target.value
                    });

                    const button_container = document.createElement('div')
                    button_container.classList.add('d-flex', 'gap-4', 'py-2')

                    const button_save = document.createElement('button')
                    button_save.classList.add('btn', 'btn-primary', 'py-2', 'mb-2')
                    button_save.innerText = 'Salvar'

                    const button_cancel = document.createElement('button')
                    button_cancel.classList.add('btn', 'btn-light', 'py-2')
                    button_cancel.innerText = 'cancelar'
                    
                    container.innerHTML = ''
                    container.appendChild(textarea)
                    container.appendChild(button_container)
                    button_container.appendChild(button_save)
                    button_container.appendChild(button_cancel)

                    cancelComment(button_cancel, container, data)
                    
                    button_save.addEventListener('click', function() {
                        const url = `/chapters/comment/${id}/update`
                        const method = 'PUT'
                        
                        fetch(url, {
                            method: method,
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({ 'comment': text })
                        })
                        .then(function(){
                            container.innerHTML = ''
                            container.innerText = text
                        })
                        .then(html => {
                            initComments()
                        })
                    })
                })
            }

            if(reply){
                reply.addEventListener('click', function(){
                    const container_entry = element.querySelector('.comment_entry')

                    const reply_div = document.createElement('div')
                    reply_div.classList.add('reply_container')

                    const textarea = document.createElement('textarea')
                    textarea.classList.add('form-control', 'mt-4')
                    textarea.name = 'comment'
                    textarea.addEventListener('input', function(event) {
                        text = event.target.value
                    });

                    const button_container = document.createElement('div')
                    button_container.classList.add('d-flex', 'gap-4', 'py-2')

                    const button_save = document.createElement('button')
                    button_save.classList.add('btn', 'btn-primary', 'py-2', 'mb-2')
                    button_save.innerText = 'Salvar'

                    const button_cancel = document.createElement('button')
                    button_cancel.classList.add('btn', 'btn-light', 'py-2')
                    button_cancel.innerText = 'cancelar'
                    

                    container_entry.appendChild(reply_div)
                    reply_div.appendChild(textarea)
                    reply_div.appendChild(button_container)
                    button_container.appendChild(button_save)
                    button_container.appendChild(button_cancel)

                    cancelReply(button_cancel, reply_div)
                    commentReply(id, student_id, text)
                })
            }

            if(like){
                like.addEventListener('click', function(){
                    const dispatch = likeComment(id, student_id, like.getAttribute('data-type'))
                    if(dispatch == 'sucess'){
                        console.log('like successfully')
                    }
                })
            }
        })
    }
}

initComments()
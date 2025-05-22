export function createPostElement(postData) {
    var currentUrl = window.location.protocol + '//' + window.location.host;
    currentUrl = window.location.protocol === 'https:' ? 'https://rocketmember.app' : currentUrl;

    const postElement = document.createElement('div');
    postElement.className = 'col-lg-12 mt-4 mb-4';
    postElement.innerHTML = `
      <div class="card card-bordered">
        <img src="" class="card-img-top" alt="">
        <div class="card-inner">
            <div class="mt-2 mb-4">
                <h5 class="card-title"></h5>
            </div>
            <div class="project-head">
                <a class="project-title">
                    <div class="user-avatar md bg-blue">
                        <img src="" alt="">
                    </div>
                    <div class="project-info">
                        <h6 class="title"></h6>
                        <small></small>
                    </div>
                </a>
            </div>
            <div class="community__media" id="media">
            </div>
            <p class="card-text">
                <div>
                    <div class="trix-content post-description">
                        
                    </div>
                </div>
            </p>
            <hr>
            <div class="row mt-2">
                <div class="col-lg-12 d-flex mt-4">
                    <a style="cursor:pointer;" onclick="activity_like('like')" class="">
                        <h6>
                            <em class="icon ni ni-thumbs-up"></em>
                            <span id="like_number">Curtir</span>
                        </h6>
                    </a>
                    <a style="cursor:pointer; margin-left: 27px;" onclick="activity_like('like')" class="">
                        <h6>
                            <em class="icon ni ni-comments"></em>
                            <span id="like_number">Comentários</span>
                        </h6>
                    </a>
                </div>
                <p><small class="mt-2 d-block">0 pessoa(s) curtiram essa postagem</small></p>
            </div>
            <hr>
            <div class="nk-reply-form">
                <div class="nk-reply-form-editor">
                    <div class="nk-reply-form-field">
                        <textarea class="form-control form-control-simple no-resize" placeholder="Hello" id="post_content"></textarea>
                    </div>
                </div>
                <div class="nk-reply-form-tools">
                    <ul class="nk-reply-form-actions g-1">
                        <li class="me-2">
                            <button class="btn btn-primary" type="button" onclick="submitPost()">Send</button>
                        </li>
                        <li>
                            <a class="btn btn-icon btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" href="#" aria-label="Upload Attachment" data-bs-original-title="Upload Attachment">
                                <em class="icon ni ni-clip-v"></em>
                            </a>
                        </li>
                        <li>
                            <a class="btn btn-icon btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" href="#" aria-label="Upload Images" data-bs-original-title="Upload Images">
                                <em class="icon ni ni-img"></em>
                            </a>
                        </li>
                    </ul>
                    <ul class="nk-reply-form-actions g-1">
                        <li>
                            <a href="#" class="btn-trigger btn btn-icon me-n2">
                                <em class="icon ni ni-trash"></em>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
      </div>
    `;
    
    const avatarElement = postElement.querySelector('.user-avatar img');
    avatarElement.src = currentUrl + '/storage/uploads/profile/' + postData.avatar;
  
    const authorElement = postElement.querySelector('.title');
    authorElement.textContent = postData.author;

    const descriptionElement = postElement.querySelector('.post-description');
    descriptionElement.innerHTML = postData.description;

    if (postData.media.length > 0) {

        if(postData.media[0].type === 'image' || postData.media[0].type === 'video'){

            const type = postData.media[0].type === 'image' ? 'img' : 'video';
            const mediaDiv = document.createElement(type);
            
            const mediaElement = postElement.querySelector('#media');
            const mediaSrc = `${currentUrl}/storage/uploads/community/media/${postData.media[0].type}/${postData.media[0].media}`;
            
            mediaDiv.src = mediaSrc;
    
            if(postData.media[0].type === 'video') {
                mediaDiv.controls = true;
                mediaDiv.autoplay = false;
                mediaDiv.loop = true;
            }
    
            mediaElement.appendChild(mediaDiv);
        }
    }
      
  
    return postElement;
  }
  
  
  
  
  
  
  
  
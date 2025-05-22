import { createPostElement } from './template/post.js';

function resolveElement(selector) {
  return document.querySelector(selector);
}

class App {
  constructor() {
    this.form = document.getElementById("frmTarget");
    this.init();
  }

  init() {
    this.uploadFile("btn_image", this.previewImage);
    this.uploadFile("btn_file", this.previewFile);
    this.uploadFile("btn_media", this.previewVideo);
    this.setupFormSubmit();
  }

  uploadFile(buttonId, previewCallback) {
    const button = resolveElement(`[data-id="${buttonId}"]`);
    const inputFile = button.querySelector('input[type="file"]');

    button.addEventListener('click', () => {
      inputFile.click();
    });

    inputFile.addEventListener('change', (e) => {
      const file = e.target.files[0];
      const fileType = file.type;

      if (fileType.startsWith('image/') || fileType.startsWith('video/') || fileType === 'application/pdf') {
        previewCallback.call(this, file);
      }
    });
  }

  previewImage(file) {
    this.previewFile(file, 'img', 'src');
  }

  previewVideo(file) {
    this.previewFile(file, 'video', 'src');
  }

  previewFile(file, elementTag, srcAttribute) {
    const reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onloadend = () => {
      const div = document.createElement("div")
      div.classList.add("preview__item")
      div.setAttribute('data-id', elementTag)

      const close = document.createElement("span")
      close.classList.add("preview__close")

      const element = document.createElement(elementTag);
      element[srcAttribute] = reader.result;

      const preview = document.getElementById('preview')
      preview.appendChild(div)
      div.appendChild(close)
      div.appendChild(element)
    };
  }

  async addPostsToContainer(postsData) {
    const postsContainer = document.getElementById('posts-container');

    for (const postData of postsData) {
      const postElement = createPostElement(postData);
      postsContainer.prepend(postElement);
    }
  }

  async sendFormData() {
    const preview = document.getElementById('preview')
    const url = this.form.getAttribute('action');
    const formData = new FormData(this.form);
    const headers = {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    };

    try {
      const response = await fetch(url, {
        method: 'POST',
        headers: headers,
        body: formData
      });

      if (!response.ok) {
        throw new Error('Network response was not ok');
      }

      const data = await response.json();
      const postData = [{
        avatar: data.user.avatar,
        author: data.user.name,
        created_at: data.data.created_at,
        description: data.data.description,
        like_count: 0,
        media: data.media ? data.media : null,
      }];

      await this.addPostsToContainer(postData);

      this.form.reset();
      preview.innerHTML = "";
    } catch (error) {
      console.error('Error:', error);
    }
  }

  setupFormSubmit() {
    const submitButton = resolveElement('[data-id="btn_submit"]');
    submitButton.addEventListener('click', async (e) => {
      e.preventDefault();
      await this.sendFormData();
    });
  }
}

new App();

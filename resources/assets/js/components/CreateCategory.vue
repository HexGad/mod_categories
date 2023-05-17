<template>
  <div class="card card-body">
    <div class="row">
      <div class="row mt-3 mb-3">
        <div class="col">
          <div class="form-group">
            <label for="">Name</label>
            <input class="form-control" v-model="category.name" @change="generateSlugFromTitle">
            <small class="text-danger" v-if="errors.name">{{ errors.name[0] }}</small>
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="">Slug</label>
            <input class="form-control" v-model="category.slug">
            <small class="text-danger" v-if="errors.slug">{{ errors.slug[0] }}</small>
          </div>
        </div>
      </div>
      <div class="row mt-3 mb-3">
        <div class="form-group">
          <label for="">Description</label>
          <textarea class="form-control" v-model="category.description" style="resize: none;"></textarea>
          <small class="text-danger" v-if="errors.description">{{ errors.description[0] }}</small>
        </div>
      </div>
      <div class="row mt-3 mb-3 px-5">

        <button type="button" class="btn btn-primary" @click="createCategory" :data-kt-indicator="is_loading? 'on':'off'" :disabled="is_loading">
          <span class="indicator-label">
              <span class="svg-icon svg-icon-1">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path
                      d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V173.3c0-17-6.7-33.3-18.7-45.3L352 50.7C340 38.7 323.7 32 306.7 32H64zm0 96c0-17.7 14.3-32 32-32H288c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V128zM224 288a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
              </span>
              Save
          </span>
          <span class="indicator-progress">Please wait...
              <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
          </span>
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "CreateCategory",
  data: () => ({
    is_loading: false,
    category: {
      name: null,
      slug: null,
      description: null,
    },
    errors: {
      name: null,
      slug: null,
      description: null
    }
  }),
  methods: {
    async createCategory() {
      this.errors.name = null;
      this.is_loading = true;

      await axios.post(route('dashboard.categories.store'), this.category).then((res) => {
        window.location.href = route('dashboard.categories.index')
      }).catch((err) => {
        if (err.response && err.response.status === 422)
          this.errors = Object.assign(this.errors, err.response.data.errors);

        this.is_loading = false;
      });
    },
    generateSlugFromTitle(){
        this.category.slug = this.category.name.toString().toLowerCase()
            .replace(/\s+/g, '-')
            .replace(/[^\w\u0621-\u064A0-9-]+/g, '')
            .replace(/\-\-+/g, '-')
            .replace(/^-+/, '').replace(/-+$/, '');
    }
  }
}
</script>

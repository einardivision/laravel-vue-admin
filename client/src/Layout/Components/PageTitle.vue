<template>
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i :class="icon"/>
                </div>
                <div>
                    {{heading}}
                    <div
                            class="page-title-subheading">
                        {{subheading}}
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                <button v-if="!noCreateNew"
                        type="button"
                        class="btn-shadow d-inline-flex align-items-center btn btn-success"
                        @click="onCreateNew">
                    <font-awesome-icon class="mr-2" icon="plus"/>
                    Create New
                </button>
            </div>
        </div>
    </div>
</template>

<script>
  import {library} from '@fortawesome/fontawesome-svg-core'
  import {
    faStar,
    faPlus
  } from '@fortawesome/free-solid-svg-icons'
  import {FontAwesomeIcon} from '@fortawesome/vue-fontawesome'

  library.add(
      faStar,
      faPlus,
  );

  export default {
    components: {
      'font-awesome-icon': FontAwesomeIcon,
    },
    props: {
      icon: String,
      heading: String,
      subheading: String,
      noCreateNew: Boolean
    },
    methods: {
      onCreateNew() {
        this.$emit('create-new')
      }
    }
  }
</script>

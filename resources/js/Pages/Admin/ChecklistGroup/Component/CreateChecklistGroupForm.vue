<template>
  <div class="bg-white border-b border-gray-200">
    Checklist group
  </div>
</template>

<script>
import JetFormSection from '@/Jetstream/FormSection'

export default {
  components: {
    JetFormSection
  },
  data() {
    return {
      form: this.$inertia.form({
        // form input data
      }),
    }
  }
}
</script>

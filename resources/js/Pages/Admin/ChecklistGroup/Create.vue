<template>
  <app-layout>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <create-checklist-group-form />
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/Admin/AppLayout'
import CreateChecklistGroupForm from '@/Pages/Admin/ChecklistGroup/Component/CreateChecklistGroupForm'

export default {
  components: {
    AppLayout,
    CreateChecklistGroupForm
  }
}
</script>

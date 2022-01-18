<template>
  <div>
    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
      <div class="container mx-auto">
        <jet-button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3 float-right" @click="openCreateChecklistModal">
          {{ checkListButton }}
        </jet-button>
        <table class="table-auto border border-collapse w-full rounded-md">
          <thead>
            <tr class="bg-gray-100">
              <th class="border px-4 py-2 w-20">ID</th>
              <th class="border px-4 py-2">Name</th>
              <th class="border px-4 py-2">Description</th>
              <th class="border px-4 py-2">Created at</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td class="border px-4 py-2">1</td>
              <td class="border px-4 py-2">Test</td>
              <td class="border px-4 py-2">For testing</td>
              <td class="border px-4 py-2">10/7/2021</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <span>
      <jet-dialog-modal :show="showCreateChecklistModal" @close="closeCreateChecklistModal">
        <template #title>
          {{ checkListModalTitle }}
        </template>

        <template #content>
          <form @submit.prevent="submit">
            <div>
              <jet-label for="name" value="Name" />
              <jet-input id="checklist.name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus />
            </div>
          </form>
        </template>

         <template #footer>
          <jet-secondary-button @click="closeCreateChecklistModal">
            Cancel
          </jet-secondary-button>
          <jet-button class="ml-2" @click="createChecklist" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
            Create
          </jet-button>
        </template>
      </jet-dialog-modal>
    </span>
  </div>
</template>

<script>
  import JetButton from '@/Jetstream/Button'
  import JetSecondaryButton from '@/Jetstream/SecondaryButton'
  import JetDialogModal from '@/Jetstream/DialogModal'
  import JetLabel from '@/Jetstream/Label'
  import JetInput from '@/Jetstream/Input'

  export default {
    props: {
      checkListButton: {
        default: 'Create new checklist'
      },
      checkListModalTitle: {
        default: 'Create Checklist'
      },
      checlistModalContent: {
        default: 'Create form'
      }
    },
    components: {
      JetButton,
      JetSecondaryButton,
      JetDialogModal,
      JetLabel,
      JetInput
    },
    data() {
      return {
        showCreateChecklistModal: false,
        form: {
          name: ''
        }
      }
    },
    methods: {
      openCreateChecklistModal() {
        this.showCreateChecklistModal = true;
      },
      createChecklist() {
        console.log("Form", this.form)
      },
      closeCreateChecklistModal() {
        this.showCreateChecklistModal = false;
      }
    }
  }

</script>

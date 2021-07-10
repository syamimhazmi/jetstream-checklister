<template>
  <div>
    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
      <div class="container">
        <!-- <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3 float-right">Create New Post</button> -->
        <jet-button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3 float-right">
          {{ button }}
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
  </div>
</template>

<script>
  import JetButton from '@/Jetstream/Button'

  export default {
    components: {
      JetButton
    },
    props: {
      button: {
        default: 'Create new checklist'
      }
    }
  }

</script>

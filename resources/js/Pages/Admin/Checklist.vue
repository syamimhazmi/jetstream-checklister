<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Checklist
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <checklist-index />
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/Admin/AppLayout'
    import ChecklistIndex from '@/Pages/Admin/Checklist/Index'

    export default {
        components: {
            AppLayout,
            ChecklistIndex
        },
    }
</script>

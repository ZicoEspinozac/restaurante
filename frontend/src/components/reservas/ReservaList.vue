<template>
    <v-container>
      <v-btn color="#FFF8E1" class="mb-4" @click="router.push('/reservas/create')">
        Nueva Reserva
      </v-btn>
      <v-data-table
        :items="items"
        :headers="headers"
        :loading="loading"
        class="custom-table"
        item-class="custom-table-row"
      >
        <template #item.comensal="{ item }">{{ item.comensal.nombre }}</template>
        <template #item.mesa="{ item }">{{ item.mesa.numero_mesa }}</template>
        <template #item.fecha_hora_reserva="{ item }">
          {{ new Date(item.fecha_hora_reserva).toLocaleString() }}
        </template>
        <template #item.actions="{ item }">
          <v-icon small class="mr-2" @click="edit(item.id)">mdi-pencil</v-icon>
          <v-icon small @click="remove(item.id)">mdi-delete</v-icon>
        </template>
      </v-data-table>
    </v-container>
  </template>
  
  <script setup>
  import { ref, onMounted } from 'vue'
  import { useRouter } from 'vue-router'
  import axios from '../../axios.js'
  
  const router  = useRouter()
  const items   = ref([])
  const loading = ref(false)
  const headers = [
    { title: 'Comensal',         value: 'comensal' },
    { title: 'Mesa',             value: 'mesa' },
    { title: 'Fecha & Hora',     value: 'fecha_hora_reserva' },
    { title: 'Nº Personas',      value: 'numero_personas' },
    { title: 'Acciones',         value: 'actions', sortable: false },
  ]
  
  const fetch = async () => {
    loading.value = true
    const { data } = await axios.get('/reservas')
    items.value   = data
    loading.value = false
  }
  
  const edit   = id => router.push(`/reservas/${id}/edit`)
  const remove = async id => {
    await axios.delete(`/reservas/${id}`)
    fetch()
  }
  
  onMounted(fetch)
  </script>

<style scoped>
.custom-table {
  background-color: #FFF8E1;
  border-radius: 8px;
  overflow: hidden;
}

/* Encabezado de tabla */
.custom-table :deep(thead) {
  background-color: #6D4C41;
  color: white;
}

/* Alternancia de filas */
.custom-table-row:nth-child(odd) {
  background-color: #FFF3E0;
}

.custom-table-row:nth-child(even) {
  background-color: #FFECB3;
}
</style>
<template>
  <v-container>
    <v-btn color="#FFF8E1" class="mb-4" @click="router.push('/comensals/create')">
      Nuevo Comensal
    </v-btn>
    <v-data-table
      :items="items"
      :headers="headers"
      :loading="loading"
      class="custom-table"
      item-class="custom-table-row"
    >
      <template #item.actions="{ item }">
        <v-icon small class="mr-2 brown--text text--darken-2" @click="edit(item.id)">mdi-pencil</v-icon>
        <v-icon small class="brown--text text--darken-2" @click="remove(item.id)">mdi-delete</v-icon>
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
  { title: 'Nombre',    value: 'nombre' },
  { title: 'Correo',    value: 'correo' },
  { title: 'Teléfono',  value: 'telefono' },
  { title: 'Dirección', value: 'direccion' },
  { title: 'Acciones',  value: 'actions', sortable: false },
]

const fetch = async () => {
  loading.value = true
  const { data } = await axios.get('/comensals')
  items.value   = data
  loading.value = false
}

const edit = id    => router.push(`/comensals/${id}/edit`)
const remove = async id => {
  await axios.delete(`/comensals/${id}`)
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
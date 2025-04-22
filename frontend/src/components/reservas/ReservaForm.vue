<template>
    <v-container class="d-flex justify-center">
        <v-card
            color="#FFF8E1"
            elevation="4"
            class="pa-4"
            width="600"
            rounded
        >
      <v-form @submit.prevent="save">
        <v-select
          v-model="form.comensal_id"
          :items="comensals"
          item-title="nombre"
          item-value="id"
          label="Comensal"
          required
        />
        <v-select
          v-model="form.mesa_id"
          :items="mesas"
          item-title="numero_mesa"
          item-value="id"
          label="Mesa"
          required
        />
        <v-text-field
          v-model="form.fecha_hora_reserva"
          label="Fecha y Hora"
          type="datetime-local"
          required
        />
        <v-text-field
          v-model="form.numero_personas"
          label="Número de Personas"
          type="number"
          required
        />
        <v-btn color="#5D4037" type="submit" :loading="saving">
          Guardar
        </v-btn>
        <v-btn text @click="router.back()">Cancelar</v-btn>
      </v-form>
      </v-card>
    </v-container>
  </template>
  
  <script setup>
  import { ref, onMounted } from 'vue'
  import { useRoute, useRouter } from 'vue-router'
  import axios from '../../axios.js'
  
  const route      = useRoute()
  const router     = useRouter()
  const form       = ref({ comensal_id: null, mesa_id: null, fecha_hora_reserva: '', numero_personas: '' })
  const comensals  = ref([])
  const mesas      = ref([])
  const saving     = ref(false)
  
  // cargar opciones
  onMounted(async () => {
    const [c, m] = await Promise.all([axios.get('/comensals'), axios.get('/mesas')])
    comensals.value = c.data
    mesas.value     = m.data
  
    if (route.params.id) {
      const { data } = await axios.get(`/reservas/${route.params.id}`)
      Object.assign(form.value, data)
    }
  })
  
  const save = async () => {
    saving.value = true
    if (route.params.id)
      await axios.put(`/reservas/${route.params.id}`, form.value)
    else
      await axios.post('/reservas', form.value)
    saving.value = false
    router.push('/reservas')
  }
  </script>
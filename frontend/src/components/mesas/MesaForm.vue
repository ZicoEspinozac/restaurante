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
        <v-text-field
          v-model="form.numero_mesa"
          label="Número de Mesa"
          required
        />
        <v-text-field
          v-model="form.capacidad"
          label="Capacidad"
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
  
  const route  = useRoute()
  const router = useRouter()
  const form   = ref({ numero_mesa: '', capacidad: '' })
  const saving = ref(false)
  
  onMounted(async () => {
    if (route.params.id) {
      const { data } = await axios.get(`/mesas/${route.params.id}`)
      Object.assign(form.value, data)
    }
  })
  
  const save = async () => {
    saving.value = true
    if (route.params.id)
      await axios.put(`/mesas/${route.params.id}`, form.value)
    else
      await axios.post('/mesas', form.value)
    saving.value = false
    router.push('/mesas')
  }
  </script>
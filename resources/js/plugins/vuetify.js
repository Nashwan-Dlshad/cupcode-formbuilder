import { createVuetify } from 'vuetify'

import * as components from 'vuetify/components'
import * as labsComponents from 'vuetify/labs/components'

import * as directives from 'vuetify/directives'
import '@mdi/font/css/materialdesignicons.css'
import 'vuetify/styles'

export default createVuetify({
    components:{
      ...components,
      ...labsComponents,
  
    },
    directives,
    locale:{
      rtl:{
        ar:true,
        ckb:true,
      }
    },
  })
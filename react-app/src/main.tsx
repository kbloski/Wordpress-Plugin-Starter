import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'

import rootElementsList from './Shared/pageRegistry';

rootElementsList.forEach( item => {
  const elements = document.querySelectorAll(`[data-react-id="${item.dataReactId}"]`);
  
  elements.forEach(el => {
    createRoot(el).render(<StrictMode>{item.element}</StrictMode>)
  })
})
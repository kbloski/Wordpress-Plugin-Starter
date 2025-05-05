import "./index.scss";

import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'

import rootElementsList from './Shared/pageRegistry';

rootElementsList.forEach( item => {
  if (!item.element) return;

  const docElements = document.querySelectorAll(`[data-react-id="${item.dataReactId}"]`);
  
  docElements.forEach(el => {
    createRoot(el).render(<StrictMode>{item.element}</StrictMode>)
  })
})
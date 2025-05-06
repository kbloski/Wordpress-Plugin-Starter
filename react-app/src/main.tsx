import "./index.scss";

import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'

import { Provider } from "react-redux";
import store from "./store";

import rootElementsList from './Shared/pageRegistry';

rootElementsList.forEach( item => {
  if (!item.element) return;

  const docElements = document.querySelectorAll(`[data-react-id="${item.dataReactId}"]`);
  
  docElements.forEach(el => {
    createRoot(el).render(<StrictMode>
        <Provider store={store}>
          {item.element}
        </Provider>
      </StrictMode>)
  })
})
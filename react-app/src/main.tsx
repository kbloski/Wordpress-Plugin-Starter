import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'
import App from './App.tsx'

createRoot(document.getElementById('my-plugin-admin-panel')!).render(
  <StrictMode>
    <App />
  </StrictMode>,
);

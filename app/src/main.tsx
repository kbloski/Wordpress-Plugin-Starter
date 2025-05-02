import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'
import App from './App.tsx'

interface ShortcodeInterface {
  class: string;
  element: React.ReactNode;
}

const shortcodes : ShortcodeInterface[] =[
  { class: "my-plugin-admin-panel", element: App}
] 

createRoot(document.getElementById('my-plugin-admin-panel')!).render(
  <StrictMode>
      {/* {shortcodes.length && shortcodes.map()} */}
  </StrictMode>,
)

import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'

import { 
    AdminHome, 
    AdminSettings,
    AdminApiTest,
    AdminDocumentation
} from './Components';

interface PageBlockInterface {
  dataReactId: string;
  element: React.ReactNode;
}

const pageBlock : PageBlockInterface[] =[
  { dataReactId: "admin-settings-page", element: <AdminSettings />},
  { dataReactId: "admin-home-page", element: <AdminHome />},
  { dataReactId: "admin-api-page", element: <AdminApiTest />},
  { dataReactId: "admin-documentation-page", element: <AdminDocumentation />},
] 

// const shortCodes :  PageBlockInterface[] = []

pageBlock.forEach( pageBlock => {
  const elements = document.querySelectorAll(`[data-react-id="${pageBlock.dataReactId}"]`);
  
  elements.forEach(el => {
    createRoot(el).render(<StrictMode>{pageBlock.element}</StrictMode>)
  })
})
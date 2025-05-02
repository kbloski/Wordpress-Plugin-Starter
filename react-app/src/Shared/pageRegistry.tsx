import { 
    Test,
    AdminHome, 
    AdminSettings,
    AdminApiTest,
    AdminDocumentation
} from '../Components';

interface RootElementInterface {
  dataReactId: string;
  element: React.ReactNode;
}

/**
 * When adding a new RootElement (React component),
 * make sure to also create its corresponding shortcode in the file:
 * 
 * include/templates/react/ShortcodesReact.php 
 * 
 * Full path: C:\xampp\htdocs\wp-content\plugins\alguin-wordpress-plugin-template\include\templates\react\ShortcodesReact.php
 */



const pageBlock : RootElementInterface[] =[
  { dataReactId: "admin-settings-page", element: <AdminSettings />},
  { dataReactId: "admin-home-page", element: <AdminHome />},
  { dataReactId: "admin-api-page", element: <AdminApiTest />},
  { dataReactId: "admin-documentation-page", element: <AdminDocumentation />},
] 

export const shortcodes :  RootElementInterface[] = [
  { dataReactId: "test-react-block", element: <Test />},
]

export default [...pageBlock, ...shortcodes];
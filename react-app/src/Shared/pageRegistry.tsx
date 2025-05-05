import { 
    AdminHome, 
    AdminSettings,
    AdminApiTest,
    AdminDocumentation,
    HelloReact,
    NotImplement
} from '../Components';

interface RootElementInterface {
  dataReactId: string;
  element: React.ReactNode;
  isImplemented?: boolean
}

/**
 * When adding a new RootElement (React component),
 * make sure to also create its corresponding shortcode in the file:
 * 
 * _plug_dir_/include/templates/react/ShortcodesReact.php 
 */

const pageBlock : RootElementInterface[] =[
  { dataReactId: "admin-settings-page", element: <AdminSettings />},
  { dataReactId: "admin-home-page", element: <AdminHome />},
  { dataReactId: "admin-api-page", element: <AdminApiTest />},
  { dataReactId: "admin-documentation-page", element: <AdminDocumentation />},
] 

const shortcodes :  RootElementInterface[] = 
  pluginData.admin.shortcodes.react.map( reactId => {
    const rootElement : RootElementInterface= { 
      dataReactId: reactId,
      element: <NotImplement />
    }

    switch(reactId){
      case "hello-react":
        rootElement.element = <HelloReact />
        rootElement.isImplemented = true;
        break;
    }

    return rootElement;
});

export { shortcodes };

export default [...pageBlock, ...shortcodes];
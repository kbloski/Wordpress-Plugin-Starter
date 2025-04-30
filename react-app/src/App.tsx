import style from "./App.module.scss";

declare const myPluginData: {
  ajaxUrl: string;
  nonce: string;
  [key: string]: any;
};

function App() {

  console.log(myPluginData);

  return (
    <div className={style.App}>
      Hello from react app
    </div>
  )
}

export default App

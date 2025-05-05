// import style from "./Documentation.module.scss"
import { shortcodes as reactShortcodes } from "../../../Shared/pageRegistry"

function Documentation() {
  const phpShortcodes = pluginData.admin.shortcodes.php;
  const apiLinks = Object.entries(pluginData.api.endpoints);
  console.log(apiLinks);

  return (
     <div>
        <h1>Documentation</h1>
        <hr />
        <h3>Php Shortcodes</h3>
        <ul>
          { !phpShortcodes.length ? "Empty array" : phpShortcodes.map( shortcode => <li key={shortcode}>[{shortcode}]</li>)}
        </ul>
        <h3>React Shortcodes</h3>
        <ul>
          { !reactShortcodes.length ? "Empty array" : reactShortcodes.map( rootEl => <li key={rootEl.dataReactId}>
            <span>[{rootEl.dataReactId}]</span>
            <span>{ rootEl.isImplemented ? "Is implemented" : "Not implemented yet"}</span>
          </li>)}
        </ul>
    </div>
  )
}

export default Documentation

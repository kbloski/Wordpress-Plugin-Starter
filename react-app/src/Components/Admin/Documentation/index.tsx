// import style from "./Documentation.module.scss"
import { shortcodes as reactShortcodes } from "../../../Shared/pageRegistry"

function Documentation() {
  const phpShortcodes = pluginData.admin.shortcodes.php;

  return (
     <div>
        <h1>Documentation</h1>
        <hr />
        <h3>Php Shortcodes</h3>
        <ul>
          { !phpShortcodes.length ? "Empty array" : phpShortcodes.map( shortcode => 
            <li key={shortcode}>
              <i className="pi pi-check-circle" />
              <span>[{shortcode}]</span>
            </li>)
          }
        </ul>
        <h3>React Shortcodes</h3>
        <table>
          <tr>
            <th>Shorcode</th><th>Implemented</th><th>React Component</th>
          </tr>
          { !reactShortcodes.length ? "Empty array" : reactShortcodes.map( rootEl => <li key={rootEl.dataReactId}>
            { rootEl.isImplemented 
                ? <span><i className="pi pi-check-circle"/>Implemented</span> 
                : <span><i className="pi pi-times-circle"/>Not implemented</span> 
            }
            <span>[{rootEl.dataReactId}]</span>
          </li>)}
        </table>
    </div>
  )
}

export default Documentation

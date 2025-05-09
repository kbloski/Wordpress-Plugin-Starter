import style from "./Documentation.module.scss"
import { shortcodes as reactShortcodes } from "../../../Shared/pageRegistry"
import { Copy } from "../../"

function Documentation() {
  const phpShortcodes = pluginData.admin.shortcodes.php;

  return (
     <div>
        <h1>Documentation</h1>
        <hr />
        <h3>Php Shortcodes</h3>
        <ul className={style.phpShortcodesList}>
          { !phpShortcodes.length ? "Empty array" : phpShortcodes.map( shortcode => 
            <li key={shortcode}>
              <i className="pi pi-check-circle" />
              <span>[{shortcode}]</span>
              <Copy text={`[${shortcode}]`}/>
            </li>)
          }
        </ul>
        <h3>React Shortcodes</h3>
        <table className={style.reactShortcodesTable}>
        <tr>
            <th></th>
            <th colSpan={2}>Implemented in</th>
          </tr>
          <tr>
            <th>Shorcode</th>
            <th>PHP</th>
            <th>React</th>
          </tr>
          { !reactShortcodes.length ? "Empty array" : reactShortcodes.map( rootEl => <tr key={rootEl.dataReactId}>
            <td>[{rootEl.dataReactId}] <Copy text={`[${rootEl.dataReactId}]`} /></td>
            <td><i className="pi pi-check-circle"/></td>
            <td>
              { rootEl.isImplemented 
                  ? <i className="pi pi-check-circle"/>
                  : <i className="pi pi-times-circle"/>
              }
            </td>
            
          </tr>)}
        </table>
    </div>
  )
}

export default Documentation

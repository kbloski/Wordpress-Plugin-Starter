import { shortcodes } from "../../../Shared/pageRegistry"
import style from "./Documentation.module.scss"

function Documentation() {

  return (
     <div>
        <h1>Documentation</h1>
        <hr />
        <h2>Your ShortCodes</h2>
        { !shortcodes.length ? <span>You don't have shortcodes yet.</span> : 
        <ul className={style.shortcodeList}>
          <li>
            [{ shortcodes.map( el => el.dataReactId)}]
            <span><a aria-disabled className={style.copy}>Copy</a></span>
          </li>
        </ul>
        }
        
    </div>
  )
}

export default Documentation

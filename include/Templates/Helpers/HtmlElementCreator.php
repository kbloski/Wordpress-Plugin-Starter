<?php

namespace Inc\Templates\Helpers;

class HtmlElementCreator
{
    private const DATA_LOAD_INFO_PROP = 'data-load-info-id';
    private const DATA_REACT_ID_PROP = 'data-react-id';

    private static function createUniqueDataLoadInfoId() : string
    {
        return uniqid('load-info-', true);
    }

    private static function elScript(string $loadInfoId)
    {
        ob_start(); ?>

        <script>
            function fadeIn(element) {
                if (!element) return;

                let opacity = 0;
                element.style.opacity = 0;

                function animate() {
                    opacity += 0.01;
                    if (opacity >= 1) {
                        element.style.opacity = 1;
                        return;
                    }
                    element.style.opacity = opacity;
                    requestAnimationFrame(animate);
                }

                requestAnimationFrame(animate);
            }


            window.addEventListener('load', () => {
                const loadContainerInfo = document.querySelector('[<?php echo self::DATA_LOAD_INFO_PROP; ?>="<?php echo $loadInfoId; ?>"]');
                if (!loadContainerInfo) return; 

                fadeIn(loadContainerInfo);

                loadContainerInfo.innerHTML = '';

                // Paragraph
                const pInfo = document.createElement('p');
                pInfo.innerText = "Oops! Something went wrong while loading the component. This component may not be implemented yet. Please refresh side or try again later.";
                loadContainerInfo.appendChild(pInfo);

                // Button
                const btnRefresh = document.createElement('button');
                btnRefresh.innerText = "Refresh";
                btnRefresh.onclick = () => { location.reload(); };

                loadContainerInfo.appendChild(btnRefresh);
            });
        </script>

        <?php 
        return ob_get_clean();
    }


    public static function createDivWithReactId(string $dataReactId, ?string $customHtmlTemplate = null): string
    {
        $uniqueLoadInfoId = self::createUniqueDataLoadInfoId();

        $code = "<div " . self::DATA_REACT_ID_PROP . "='" . htmlspecialchars($dataReactId, ENT_QUOTES, 'UTF-8') . "'>";
        $code .= $customHtmlTemplate ?? " 
            <div style='text-align: center;' " . self::DATA_LOAD_INFO_PROP . "='" . $uniqueLoadInfoId . "'>
                Loading application component...
            </div>";
        $code .= self::elScript($uniqueLoadInfoId);
        $code .= "</div>";

        return $code;
    }
}

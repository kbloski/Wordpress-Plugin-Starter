declare const pluginData: {
    config: {
      pluginPrefix : string;
    },
    api : {
      rest : {
        baseUrl: string;
        endpoints: Record<string, string>;
      }
    },
    admin : {
      shortcodes : {
        php : string[],
        react: string[]
      }
    }

};
  
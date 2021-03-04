module.exports = {
    base: '/docs/',
    title: 'wdcms文档',
    description: 'SAAS软件快速开发方案',
    themeConfig: {
        sidebarDepth: 2,
        lastUpdated: 'Last Updated',
        displayAllHeaders: true, // 默认值：false
        locales: {
            '/': {
                lang: 'en-US', // 将会被设置为 <html> 的 lang 属性
                title: 'wdcms文档',
                description: 'SAAS软件快速开发方案'
            },
        },
        nav: [
            {
                text: '首页',
                link: '/'
            },
            {
                text: '指南',
                link: '/zh/guide/'
            },
            {
                text: '模块',
                ariaLabel: 'Language Menu',
                items: [
                  { text: '交易模块', link: '/zh/payment/' }
                ]
            },
            {
                text: 'Github',
                link: 'https://github.com/luminacms/lumina',
                target:'_blank',
                rel:''
            }

        ],
        sidebar: {
            '/zh/guide/': [{
                title: '使用指南',
                collapsable: false,
                children: [
                    '',
                    'xgee.md',
                    'option.md',
                    'datatable.md',
                    'mvc.md',
                    'component.md',
                    'workflow.md',
                    'lumina.js.md',
                    'trait.md'
                ]
            }],
            '/zh/payment/': [{
                title: '交易模块',
                collapsable: false,
                children: [
                    ''
                ]
            }]
        }
    },
    plugins: [
        '@vuepress/back-to-top',
        '@vuepress/medium-zoom',
        '@vuepress/active-header-links'
    ]
}

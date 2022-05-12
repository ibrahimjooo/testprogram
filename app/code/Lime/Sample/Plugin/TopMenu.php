<?php

namespace Lime\Sample\Plugin;
    use Magento\Framework\Data\Tree\NodeFactory;
    use Magento\Framework\UrlInterface;

    class   Topmenu
    {
        protected $nodeFactory;
        protected $urlBuilder;

        public function __construct(NodeFactory $nodeFactory, UrlInterface $urlBuilder)
        {
            $this->nodeFactory = $nodeFactory;
            $this->urlBuilder = $urlBuilder;
        }

        public function beforeGetHtml(\Magento\Theme\Block\Html\Topmenu $subject, $outermostClass = '', $childrenWrapClass = '', $limit = 0)
        {
            $menuNode = $this->nodeFactory->create(['data' => $this->getNodeAsArray("Home", "Lime_Sample"),
                'idField' => 'id',
                'tree' => $subject->getMenu()->getTree(),]);
            // $menuNode->addChild($this->nodeFactory->create(['data' => $this->getNodeAsArray("MainMenu", "mnuMyMenu"),
            //     'idField' => 'id',
            //     'tree' => $subject->getMenu()->getTree(),]));

            $subject->getMenu($menuNode)->addChild($menuNode);

        }

        protected function getNodeAsArray($name, $id)
        {
            $url = $this->urlBuilder->getUrl("/sample/index/test"); //here you can add url as per your choice of menu
            return ['name' => __($name),
                'id' => $id,
                'url' => '/sample/index/test',
                'has_active' => false,
                'is_active' => false,];
        }
    }
<?php

namespace UpAssist\MegaMenu\Fusion\Helper;

use Neos\ContentRepository\Domain\Model\NodeInterface;
use Neos\ContentRepository\Exception\NodeException;
use Neos\Eel\ProtectedContextAwareInterface;
use Neos\Flow\Annotations as Flow;
use Neos\Neos\Service\LinkingService;

/**
 * @Flow\Scope ("singleton")
 */
class LinkHelper implements ProtectedContextAwareInterface
{
    /**
     * @var LinkingService
     * @Flow\Inject
     */
    protected LinkingService $linkingService;

    /**
     * @throws NodeException
     */
    public function labelForLink(NodeInterface $node = null): string
    {
        if($node !== null) {
            if ($node->getProperty('enableItemLabel') && $node->getProperty('itemLabel')) {
                return (string)$node->getProperty('itemLabel');
            }

            if (str_starts_with($node->getProperty('item'), 'node://')) {
                /** @var NodeInterface $itemNode */
                $itemNode = $this->linkingService->convertUriToObject($node->getProperty('item'), $node);

                if ($itemNode) {
                    return $itemNode->getLabel();
                }
            }

            if (str_starts_with($node->getProperty('item'), 'http')) {
                return $node->getProperty('item');
            }
        }

        return 'Enter a value';
    }

    public function allowsCallOfMethod($methodName)
    {
        return true;
    }
}

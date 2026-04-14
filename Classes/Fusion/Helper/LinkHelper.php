<?php

namespace UpAssist\MegaMenu\Fusion\Helper;

use Neos\ContentRepository\Core\Projection\ContentGraph\Node;
use Neos\Eel\ProtectedContextAwareInterface;
use Neos\Flow\Annotations as Flow;
use Neos\Neos\Domain\NodeLabel\NodeLabelGeneratorInterface;
use Neos\Neos\Service\LinkingService;

/**
 * @Flow\Scope ("singleton")
 */
class LinkHelper implements ProtectedContextAwareInterface
{
    #[Flow\Inject]
    protected LinkingService $linkingService;

    #[Flow\Inject]
    protected NodeLabelGeneratorInterface $nodeLabelGenerator;

    public function labelForLink(Node $node = null): string
    {
        if ($node === null) {
            return 'Enter a value';
        }

        $item = (string)($node->getProperty('item') ?? '');

        if ($node->getProperty('enableItemLabel') && $node->getProperty('itemLabel')) {
            return (string)$node->getProperty('itemLabel');
        }

        if ($item === '') {
            return 'Enter a value';
        }

        if (str_starts_with($item, 'node://')) {
            try {
                $itemNode = $this->linkingService->convertUriToObject($item, $node);
            } catch (\Throwable $e) {
                $itemNode = null;
            }

            if ($itemNode instanceof Node) {
                return $this->nodeLabelGenerator->getLabel($itemNode);
            }

            return 'Enter a value';
        }

        if (str_starts_with($item, 'http')) {
            return $item;
        }

        if (str_starts_with($item, '#')) {
            return ucfirst(ltrim($item, '#'));
        }

        return $item;
    }

    public function allowsCallOfMethod($methodName)
    {
        return true;
    }
}

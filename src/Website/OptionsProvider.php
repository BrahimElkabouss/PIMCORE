<?php

namespace App\Website;
use Acme\Gyvfiles\GyvefileBundle\Form\Type\ClientType;
use Pimcore\Model\DataObject\ClassDefinition\Data;
use Pimcore\Model\DataObject\ClassDefinition\DynamicOptionsProvider\SelectOptionsProviderInterface;
use Symfony\Component\HttpFoundation\JsonResponse;


class OptionsProvider implements SelectOptionsProviderInterface
{
    public function getOptions(array $context, Data $fieldDefinition): array
    {
        $brandListing = new \Pimcore\Model\DataObject\Brand\Listing();
        $brands = $brandListing->getObjects();

        $result = [];

        foreach ($brands as $brand) {
            // Assuming 'name' and 'id' are properties of the Brand class
            $result[] = [
                "key" => $brand->getName(),
                "value" => $brand->getId(),
            ];
        }

        return $result;
    }

    /**
     * Returns the value which is defined in the 'Default value' field
     */
    public function getDefaultValue(array $context, Data $fieldDefinition): ?string 
    {
        return $fieldDefinition->getDefaultValue();
    }

    public function hasStaticOptions(array $context, Data $fieldDefinition): bool
    {
        return true;
    }

}
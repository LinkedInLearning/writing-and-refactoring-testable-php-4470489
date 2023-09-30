<?php
declare(strict_types=1);

function get_posts($args = null)
{
}


$args = new get_posts_args();
$args->setNumberposts(5);
class get_posts_args
{
    private int $numberposts = 5;
    private int $category = 0;
    private string $orderby = 'date';
    private string $order = 'DESC';
    private array $include = [];
    private array $exclude = [];
    private string $meta_key = '';
    private string $meta_value = '';
    private string $post_type = 'post';
    private bool $suppress_filters = true;

    /**
     * @return int
     */
    public function getNumberposts(): int
    {
        return $this->numberposts;
    }

    /**
     * @param int $numberposts
     * @return get_posts_args
     */
    public function setNumberposts(int $numberposts): get_posts_args
    {
        $this->numberposts = $numberposts;
        return $this;
    }

    /**
     * @return int
     */
    public function getCategory(): int
    {
        return $this->category;
    }

    /**
     * @param int $category
     * @return get_posts_args
     */
    public function setCategory(int $category): get_posts_args
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrderby(): string
    {
        return $this->orderby;
    }

    /**
     * @param string $orderby
     * @return get_posts_args
     */
    public function setOrderby(string $orderby): get_posts_args
    {
        $this->orderby = $orderby;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrder(): string
    {
        return $this->order;
    }

    /**
     * @param string $order
     * @return get_posts_args
     */
    public function setOrder(string $order): get_posts_args
    {
        $this->order = $order;
        return $this;
    }

    /**
     * @return array
     */
    public function getInclude(): array
    {
        return $this->include;
    }

    /**
     * @param array $include
     * @return get_posts_args
     */
    public function setInclude(array $include): get_posts_args
    {
        $this->include = $include;
        return $this;
    }

    /**
     * @return array
     */
    public function getExclude(): array
    {
        return $this->exclude;
    }

    /**
     * @param array $exclude
     * @return get_posts_args
     */
    public function setExclude(array $exclude): get_posts_args
    {
        $this->exclude = $exclude;
        return $this;
    }

    /**
     * @return string
     */
    public function getMetaKey(): string
    {
        return $this->meta_key;
    }

    /**
     * @param string $meta_key
     * @return get_posts_args
     */
    public function setMetaKey(string $meta_key): get_posts_args
    {
        $this->meta_key = $meta_key;
        return $this;
    }

    /**
     * @return string
     */
    public function getMetaValue(): string
    {
        return $this->meta_value;
    }

    /**
     * @param string $meta_value
     * @return get_posts_args
     */
    public function setMetaValue(string $meta_value): get_posts_args
    {
        $this->meta_value = $meta_value;
        return $this;
    }

    /**
     * @return string
     */
    public function getPostType(): string
    {
        return $this->post_type;
    }

    /**
     * @param string $post_type
     * @return get_posts_args
     */
    public function setPostType(string $post_type): get_posts_args
    {
        $this->post_type = $post_type;
        return $this;
    }

    /**
     * @return bool
     */
    public function isSuppressFilters(): bool
    {
        return $this->suppress_filters;
    }

    /**
     * @param bool $suppress_filters
     * @return get_posts_args
     */
    public function setSuppressFilters(bool $suppress_filters): get_posts_args
    {
        $this->suppress_filters = $suppress_filters;
        return $this;
    }
    
    
}

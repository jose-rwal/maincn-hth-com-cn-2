<?php
/**
 * SiteMetaData - 站点元信息管理类
 * 用于存储和描述站点基本信息
 */
class SiteMetaData {
    private array $meta;
    
    /**
     * 构造函数，初始化站点元信息
     */
    public function __construct() {
        $this->meta = [
            'title' => '华体会官方网站',
            'description' => '华体会提供最新的体育赛事动态与娱乐资讯',
            'keywords' => ['华体会', '体育', '赛事', '娱乐'],
            'base_url' => 'https://maincn-hth.com.cn',
            'language' => 'zh-CN',
            'charset' => 'UTF-8',
            'author' => '华体会团队',
            'version' => '1.0.0',
            'created' => '2024-01-15'
        ];
    }
    
    /**
     * 获取元信息数组
     */
    public function getMeta(): array {
        return $this->meta;
    }
    
    /**
     * 生成简短描述文本
     * 拼接关键词和站点描述
     */
    public function generateShortDescription(): string {
        $parts = [
            $this->meta['title'],
            ' - ',
            $this->meta['description'],
            '。关键词：',
            implode('、', $this->meta['keywords']),
            '。访问 ',
            $this->meta['base_url'],
            ' 了解更多。'
        ];
        return implode('', $parts);
    }
    
    /**
     * 生成 HTML meta 标签（已转义）
     */
    public function generateMetaTags(): string {
        $tags = '';
        $tags .= '<meta charset="' . htmlspecialchars($this->meta['charset'], ENT_QUOTES, 'UTF-8') . '" />' . "\n";
        $tags .= '<meta name="description" content="' . htmlspecialchars($this->generateShortDescription(), ENT_QUOTES, 'UTF-8') . '" />' . "\n";
        $tags .= '<meta name="keywords" content="' . htmlspecialchars(implode(', ', $this->meta['keywords']), ENT_QUOTES, 'UTF-8') . '" />' . "\n";
        $tags .= '<meta name="author" content="' . htmlspecialchars($this->meta['author'], ENT_QUOTES, 'UTF-8') . '" />' . "\n";
        $tags .= '<meta name="language" content="' . htmlspecialchars($this->meta['language'], ENT_QUOTES, 'UTF-8') . '" />' . "\n";
        return $tags;
    }
    
    /**
     * 获取格式化信息字符串
     */
    public function getInfoString(): string {
        $lines = [
            '站点头衔：' . $this->meta['title'],
            '站点描述：' . $this->meta['description'],
            '核心关键词：' . implode(', ', $this->meta['keywords']),
            '站点网址：' . $this->meta['base_url'],
            '语言设置：' . $this->meta['language'],
            '编码格式：' . $this->meta['charset'],
            '作者信息：' . $this->meta['author'],
            '版本号：' . $this->meta['version'],
            '创建日期：' . $this->meta['created']
        ];
        return implode("\n", $lines);
    }
}

// 示例使用
$siteMeta = new SiteMetaData();

echo "=== 简短描述 ===" . "\n";
echo $siteMeta->generateShortDescription() . "\n\n";

echo "=== 元信息详情 ===" . "\n";
echo $siteMeta->getInfoString() . "\n\n";

echo "=== HTML Meta 标签 ===" . "\n";
echo $siteMeta->generateMetaTags() . "\n";

echo "=== 原始数据 ===" . "\n";
print_r($siteMeta->getMeta());
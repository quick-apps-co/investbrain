<?php

declare(strict_types=1);

namespace App\Exports\Sheets;

use App\Models\Portfolio;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class PortfoliosSheet implements FromCollection, WithHeadings, WithTitle
{
    public function __construct(
        public bool $empty = false
    ) {}

    public function headings(): array
    {
        return [
            'Portfolio ID',
            'Title',
            'Notes',
            'Wishlist',
            'Created',
            'Updated',
        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->empty ? collect() : Portfolio::myPortfolios()->get();
    }

    public function title(): string
    {
        return 'Portfolios';
    }
}

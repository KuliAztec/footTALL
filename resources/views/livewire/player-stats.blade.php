<div>
    <div class="relative overflow-x-auto" style="max-width: 100%;">
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2 sticky left-0 z-10 bg-white shadow-sm">
                        <a href="#" wire:click.prevent="sortBy('name')">Player</a>
                    </th>
                    <th class="px-4 py-2"><a href="#" wire:click.prevent="sortBy('age')">Age</a></th>
                    <th class="px-4 py-2"><a href="#" wire:click.prevent="sortBy('height')">Height</a></th>
                    <th class="px-4 py-2"><a href="#" wire:click.prevent="sortBy('weight')">Weight</a></th>
                    <th class="px-4 py-2"><a href="#" wire:click.prevent="sortBy('club')">Club</a></th>
                    <th class="px-4 py-2"><a href="#" wire:click.prevent="sortBy('national')">National</a></th>
                    <th class="px-4 py-2"><a href="#" wire:click.prevent="sortBy('preferred_foot')">Preferred Foot</a></th>
                    <th class="px-4 py-2"><a href="#" wire:click.prevent="sortBy('position')">Position</a></th>
                    <th class="px-4 py-2"><a href="#" wire:click.prevent="sortBy('apps')">Apps</a></th>
                    <th class="px-4 py-2"><a href="#" wire:click.prevent="sortBy('minutes')">Minutes</a></th>
                    <th class="px-4 py-2"><a href="#" wire:click.prevent="sortBy('subs')">Subs</a></th>
                    <th class="px-4 py-2"><a href="#" wire:click.prevent="sortBy('goals')">Goals</a></th>
                    <th class="px-4 py-2"><a href="#" wire:click.prevent="sortBy('xG')">xG</a></th>
                    <th class="px-4 py-2"><a href="#" wire:click.prevent="sortBy('shots')">Shots</a></th>
                    <th class="px-4 py-2"><a href="#" wire:click.prevent="sortBy('assists')">Assists</a></th>
                    <th class="px-4 py-2"><a href="#" wire:click.prevent="sortBy('xA')">xA</a></th>
                    <th class="px-4 py-2"><a href="#" wire:click.prevent="sortBy('key_passes')">Key Passes</a></th>
                    <th class="px-4 py-2"><a href="#" wire:click.prevent="sortBy('progressive_passes')">Prog. Passes</a></th>
                    <th class="px-4 py-2"><a href="#" wire:click.prevent="sortBy('tackles_completed')">Tackles</a></th>
                    <th class="px-4 py-2"><a href="#" wire:click.prevent="sortBy('interceptions')">Interceptions</a></th>
                    <th class="px-4 py-2"><a href="#" wire:click.prevent="sortBy('clearances')">Clearances</a></th>
                    <th class="px-4 py-2"><a href="#" wire:click.prevent="sortBy('blocks')">Blocks</a></th>
                    <th class="px-4 py-2"><a href="#" wire:click.prevent="sortBy('possession_won_per_90')">Poss Won/90</a></th>
                    <th class="px-4 py-2"><a href="#" wire:click.prevent="sortBy('possession_lost_per_90')">Poss Lost/90</a></th>
                    <th class="px-4 py-2"><a href="#" wire:click.prevent="sortBy('clean_sheets')">Clean Sheets</a></th>
                    <th class="px-4 py-2"><a href="#" wire:click.prevent="sortBy('goals_conceded')">Goals Conc.</a></th>
                    <th class="px-4 py-2"><a href="#" wire:click.prevent="sortBy('total_distance')">Distance</a></th>
                    <th class="px-4 py-2"><a href="#" wire:click.prevent="sortBy('headers_won_per_90')">Headers Won/90</a></th>
                    <th class="px-4 py-2"><a href="#" wire:click.prevent="sortBy('headers_lost_per_90')">Headers Lost/90</a></th>
                    <th class="px-4 py-2"><a href="#" wire:click.prevent="sortBy('aerial_duels_per_90')">Aerial Duels/90</a></th>
                    <th class="px-4 py-2"><a href="#" wire:click.prevent="sortBy('yellow_cards')">YC</a></th>
                    <th class="px-4 py-2"><a href="#" wire:click.prevent="sortBy('red_cards')">RC</a></th>
                    <th class="px-4 py-2"><a href="#" wire:click.prevent="sortBy('fouls')">Fouls</a></th>
                </tr>
            </thead>
            <tbody>
                @foreach($playerStats as $stat)
                    <tr>
                        <td class="border px-4 py-2 sticky left-0 bg-white shadow-sm">{{ $stat->name }}</td>
                        <td class="border px-4 py-2">{{ $stat->age }}</td>
                        <td class="border px-4 py-2">{{ $stat->height }}</td>
                        <td class="border px-4 py-2">{{ $stat->weight }}</td>
                        <td class="border px-4 py-2">{{ $stat->club }}</td>
                        <td class="border px-4 py-2">{{ $stat->national }}</td>
                        <td class="border px-4 py-2">{{ $stat->preferred_foot }}</td>
                        <td class="border px-4 py-2">{{ $stat->position }}</td>
                        <td class="border px-4 py-2">{{ $stat->apps }}</td>
                        <td class="border px-4 py-2">{{ $stat->minutes }}</td>
                        <td class="border px-4 py-2">{{ $stat->subs }}</td>
                        <td class="border px-4 py-2">{{ $stat->goals }}</td>
                        <td class="border px-4 py-2">{{ $stat->xG }}</td>
                        <td class="border px-4 py-2">{{ $stat->shots }}</td>
                        <td class="border px-4 py-2">{{ $stat->assists }}</td>
                        <td class="border px-4 py-2">{{ $stat->xA }}</td>
                        <td class="border px-4 py-2">{{ $stat->key_passes }}</td>
                        <td class="border px-4 py-2">{{ $stat->progressive_passes }}</td>
                        <td class="border px-4 py-2">{{ $stat->tackles_completed }}</td>
                        <td class="border px-4 py-2">{{ $stat->interceptions }}</td>
                        <td class="border px-4 py-2">{{ $stat->clearances }}</td>
                        <td class="border px-4 py-2">{{ $stat->blocks }}</td>
                        <td class="border px-4 py-2">{{ $stat->possession_won_per_90 }}</td>
                        <td class="border px-4 py-2">{{ $stat->possession_lost_per_90 }}</td>
                        <td class="border px-4 py-2">{{ $stat->clean_sheets }}</td>
                        <td class="border px-4 py-2">{{ $stat->goals_conceded }}</td>
                        <td class="border px-4 py-2">{{ $stat->total_distance }}</td>
                        <td class="border px-4 py-2">{{ $stat->headers_won_per_90 }}</td>
                        <td class="border px-4 py-2">{{ $stat->headers_lost_per_90 }}</td>
                        <td class="border px-4 py-2">{{ $stat->aerial_duels_per_90 }}</td>
                        <td class="border px-4 py-2">{{ $stat->yellow_cards }}</td>
                        <td class="border px-4 py-2">{{ $stat->red_cards }}</td>
                        <td class="border px-4 py-2">{{ $stat->fouls }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

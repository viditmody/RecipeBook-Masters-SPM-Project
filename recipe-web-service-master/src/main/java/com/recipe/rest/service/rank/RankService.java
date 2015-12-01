/*************************************************************************
 * Copyright (c) Metabiota Incorporated - All Rights Reserved
 * ------------------------------------------------------------------------
 * This material is proprietary to Metabiota Incorporated. The
 * intellectual and technical concepts contained herein are proprietary
 * to Metabiota Incorporated. Reproduction or distribution of this
 * material, in whole or in part, is strictly forbidden unless prior
 * written permission is obtained from Metabiota Incorporated.
 * ***********************************************************************
 * <p/>
 * Created by WLao on 11/11/15.
 */
package com.recipe.rest.service.rank;

import com.recipe.rest.dto.Rank;

import java.util.List;
import java.util.Map;

public interface RankService {

    public Rank findById(Integer id) throws Exception;

    public Map<String, List<Rank>> findAll() throws Exception;

    public Rank add(Rank rankDTO) throws Exception;

    public void update(Integer id, Rank rankDTO) throws Exception;
}
